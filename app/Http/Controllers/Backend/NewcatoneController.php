<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Newcatone;
use Cache;
use Translation;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validate;
use App\Http\Requests\TranslationRequest;
use Illuminate\Database\Eloquent\Model;

class NewcatoneController extends ShareController
{
    public function index()
    {
        $newcatones = Newcatone::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.newcatones.index', compact('newcatones'));
    }

    public function create()
    {
        return view('backend.newcatones.create');
    }

    public function edit(Request $request, $id)
    {
        $newcatone = Newcatone::find($id);
        return view('backend.newcatones.edit', compact('newcatone'));
    }

    public function store(Request $request )
    {
        $lang = [
            'vi.name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            'vi.slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
            'vi.slug.unique' => 'URL Tiếng Việt đã tồn tại',
            'en.name.required' => 'Vui lòng nhập tên Tiếng Anh !',
            'en.slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
            'en.slug.unique' => 'URL Tiếng Anh đã tồn tại',
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
            $res = $file->storeAs('public/uploads/newcatone', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $data = [
            'type' => $request->type,
            'stt' => $request->stt,
            'img' => $name_save,
            'hide_show' => $request->hide_show,
            'show_nav' => $request->show_nav,
        ];
        $newcatone = Newcatone::create($data);
        $newcatone->translations()->createMany($request->translation);
        if ($newcatone) {
            alert()->success('Thành công !','Đã thêm danh mục thành công !');
            return redirect()->route('backend.newcatone.index');
        }
            alert()->error('Lỗi !','Thêm danh mục thất bại !');
            return redirect()->route('backend.newcatone.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Newcatone')->where('locale',session('locale'))->first()->id;
        $newcatone = Newcatone::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Việt !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
                'slug.unique' => 'URL Tiếng Việt đã tồn tại',
            ];
        } else {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Anh !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
                'slug.unique' => 'URL Tiếng Anh đã tồn tại',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'slug' => 'required|unique:translations,slug,'.$id_unique_skip,
            'name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if (!$request->hasFile('img')) {
            $name_save = $newcatone->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/newcatone', $name_save);
            $image_path_del = public_path().'/storage/uploads/newcatone/'.$newcatone->img;
            if (file_exists($image_path_del) && $newcatone->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $img_name = $newcatone->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = '568x331';
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
        }

        $newcatone->stt          = $request->stt;
        $newcatone->hide_show    = $request->hide_show;
        $newcatone->show_nav     = $request->show_nav;
        $newcatone->img          = $name_save;
        $newcatone->translations()->update($request->translation);
        $newcatone->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công",'Đã cập nhật danh mục');
        return redirect()->route('backend.newcatone.index');
    }

    public function destroy(Request $request, $id)
    {
        $newcatone = Newcatone::find($id);
        if ($newcatone) {
            if ($newcatone->img != 'placeholder.png') {
                $image_path = public_path().'/storage/uploads/newcatone/'.$newcatone->img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $newcatone->delete();
            $newcatone->delete_trans()->delete();

            alert()->success("Thành công",'Đã xóa danh mục !');
            return redirect()->route('backend.newcatone.index');
        }
            alert()->error("Lỗi",'Xóa danh mục thất bại !');
            return redirect()->route('backend.newcatone.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = Newcatone::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/newcatone/'.$image->img;
                    if (file_exists($image_path)) {
                    unlink($image_path);
                }
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Newcatone')->delete();
        Newcatone::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các Danh mục đã chọn !']);
    }
    public function hideShow(Request $request){
        $newcatone = Newcatone::find($request->newcatone_id);
        $newcatone->hide_show = $request->hide_show;
        $newcatone->save();
        return response()->json(['success'=>'Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $newcatone = Newcatone::find($request->newcatone_id);
        $newcatone->stt = $request->stt;
        $newcatone->save();
        return response()->json(['success'=>'STT change successfully.']);
    }
}
