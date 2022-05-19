<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Procatone;
use Procattwo;
use Translation;
use Cache;
use Image;
use Validate;
use Validator;
use App\Http\Requests\TranslationRequest;
use App\Http\Requests\TranslationStoreRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class ProcatoneController extends ShareController
{
    public function index()
    {
        $procatones = Procatone::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.procatones.index', compact('procatones'));
    }
    public function create()
    {
        $procatones = Procatone::get();
        return view('backend.procatones.create', compact('procatones'));
    }

    public function edit(Request $request, $id)
    {
        $procatone = Procatone::find($id);
        return view('backend.procatones.edit', compact('procatone'));
    }

    public function store(Request $request)
    {
        $lang = [
            'vi.name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            'vi.slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
            'vi.slug.unique' => 'URL Tiếng Việt đã tồn tại !',
            'en.name.required' => 'Vui lòng nhập tên Tiếng Anh !',
            'en.slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
            'en.slug.unique' => 'URL Tiếng Anh đã tồn tại !',
        ];
        $validator = Validator::make(request()->translation, [
            '*.name' => 'required',
            '*.slug' => 'required|unique:translations',
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
            $res = $file->storeAs('public/uploads/procatones', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $procatone = new Procatone();
        $procatone->stt = $request->stt ?? false;
        $procatone->hide_show = $request->hide_show ?? false;
        $procatone->show_nav = $request->show_nav ?? false;
        $procatone->is_featured = $request->is_featured ?? false;
        $procatone->img = $name_save ?? false;
        $procatone->save();
        $procatone->translations()->createMany($request->translation);
        if ($procatone) {
            alert()->success("Thành công !", "Đã thêm mới danh mục thành công !");
            return redirect()->route('backend.procatone.index');
        }
            alert()->danger("Lỗi !", "Thêm danh mục thất bại !");
            return redirect()->route('backend.procatone.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Procatone')->where('locale',session('locale'))->first()->id;
        $procatone = Procatone::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Việt !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
                'slug.unique' => 'URL Tiếng Việt đã tồn tại !',
            ];
        } else {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Anh !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
                'slug.unique' => 'URL Tiếng Anh đã tồn tại !',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'slug' => 'required|unique:translations,slug,'.$id_unique_skip,
            'name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if (!$request->hasFile('img')) {
            $name_save = $procatone->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/procatones', $name_save);
            $image_path_del = public_path().'/storage/uploads/procatones/'.$procatone->img;
            if (file_exists($image_path_del) && $procatone->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }
        $procatone->stt         = $request->stt;
        $procatone->hide_show   = $request->hide_show ? 1 : 0;
        $procatone->show_nav    = $request->show_nav;
        $procatone->is_featured = $request->is_featured;
        $procatone->img         = $name_save;
        $procatone->translations()->update($request->translation);
        $procatone->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !","Đã cập nhật lại danh mục !");
        session()->forget('locale');
        return redirect()->route('backend.procatone.index');
    }

    public function destroy(Request $request, $id)
    {
        $procatone = Procatone::find($id);
        if ($procatone) {
            $image_path_del = public_path().'/storage/uploads/procatones/'.$procatone->img;
            if (file_exists($image_path_del) && $procatone->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $procatone->delete();
            $procatone->delete_trans()->delete();
            // $msg1 = __('Xóa thành công !');
            // $msg2 = __('Đã xóa thành công mục bạn đã chọn !');
            // $msg3 = __('T !');
            // alert()->html('<i>'.$msg1.'</i>'," $msg2 <br> <b> $msg3 </b></br> ",'error')->autoClose(4000);

            alert()->success("Thành công !", "Đã Xóa danh mục đã chọn !");
            return redirect()->route('backend.procatone.index');
        }
            alert()->error("Lỗi", "Xóa danh mục thất bại !");
            return redirect()->route('backend.procatone.index');

    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = Procatone::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                $image_path = public_path().'/storage/uploads/procatones/'.$image->img;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Procatone')->delete();
        Procatone::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function ChangeIsFeatured(Request $request){
        $procatone = Procatone::find($request->procatone_id);
        $procatone->is_featured = $request->is_featured;
        $procatone->save();
        return response()->json(['success'=>'Procatone Is Featured change successfully.']);
    }
    public function hideShow(Request $request){
        $procatone = Procatone::find($request->procatone_id);
        $procatone->hide_show = $request->hide_show;
        $procatone->save();
        return response()->json(['success'=>'Procatone Hide Show change successfully.']);
    }
    public function isNew(Request $request){
        $procatone = Procatone::find($request->procatone_id);
        $procatone->is_new = $request->is_new;
        $procatone->save();
        return response()->json(['success'=>'Procatone Is New change successfully.']);
    }
    public function changeStt(Request $request){
        $procatone = Procatone::find($request->procatone_id);
        $procatone->stt = $request->stt;
        $procatone->save();
        return response()->json(['success'=>'Procatone STT change successfully.']);
    }
}
