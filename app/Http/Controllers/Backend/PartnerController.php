<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Slider;
use Partner;
use Cache;
use Validate;
use Validator;
use Translation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class PartnerController extends ShareController
{
    public function index()
    {
        $partners = Partner::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        session()->forget('locale');
        return view('backend.partner.index', compact('partners'));
    }
    public function create()
    {
        return view('backend.partner.create');
    }

    public function edit(Request $request, $id)
    {
        $partner = Partner::with('translations')->find($id);
        return view('backend.partner.edit', compact('partner'));
    }

    public function store(Request $request)
    {
        $lang = [
            'vi.name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            'en.name.required' => 'Vui lòng nhập tên Tiếng Anh !',
        ];
        $validator = Validator::make(request()->translation, [
            '*.name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/partner',$name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $data = [
            'stt' => $request->stt,
            'hide_show' => $request->hide_show,
            'url' => $request->url ?? '',
            'img' => $name_save
        ];
        $partner = Partner::create($data);
        $partner->translations()->createMany($request->translation);
        alert()->success("Thành công",'Đã thêm thương hiệu');
        return redirect()->route('backend.partner.index');

    }
    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            ];
        } else {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Anh !',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if (!$request->hasFile('img')) {
            $name_save = $partner->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/partner', $name_save);
            $image_path_del = public_path().'/storage/uploads/partner/'.$partner->img;
            if (file_exists($image_path_del) && $partner->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $img_name = $partner->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = '1440x520';
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
        }
        $partner->hide_show = $request->hide_show;
        $partner->stt       = $request->stt;
        $partner->url       = $request->url;
        $partner->img       = $name_save;
        $partner->translations()->update($request->translation);
        $partner->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !","Đã cập nhật đối tác !");
        return redirect()->route('backend.partner.index');
    }
    public function destroy(Request $request, $id)
    {
        $partner = Partner::find($id);
            $img_name = $partner->img;
            $find_ext_last = Str::replaceLast('.', '.', $img_name);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = Str::of($find_ext_last)->afterLast('.');
            $img_size_medium = '1440x520';
            $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
            $image_path_del = public_path().'/storage/uploads/partner/'.$partner->img;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_del) && $partner->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            $partner->delete();
            $partner->delete_trans()->delete();
            alert()->success("Thành công !",'Đã Xóa đối tác !');
            return redirect()->route('backend.partner.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Partner::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                // img index
                $image_path = public_path().'/storage/uploads/partner/'.$image->img;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
                // img small & medium
                $img_name = $image->img;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_medium = '1440x520';
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Partner')->delete();
        Partner::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function hideShow(Request $request){
        $partner = Partner::find($request->partner_id);
        $partner->hide_show = $request->hide_show;
        $partner->save();
        return response()->json(['success'=>'Partner Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $partner = Partner::find($request->partner_id);
        $partner->stt = $request->stt;
        $partner->save();
        return response()->json(['success'=>'Partner STT change successfully.']);
    }
}
