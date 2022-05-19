<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Newcattwo;
use Newcatone;
use Cache;
use Image;
use Validate;
use Translation;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class NewcattwoController extends ShareController
{
    public function index()
    {
        $newcattwos = Newcattwo::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcatones = Newcatone::with('translations')->get();
        return view('backend.newcattwos.index', compact('newcattwos','newcatones'));
    }
    public function create()
    {
        $newcatones = Newcatone::orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcattwos = Newcattwo::orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.newcattwos.create', compact('newcattwos','newcatones'));
    }

    public function edit(Request $request, $id)
    {
        $newcatones = Newcatone::orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcattwos = Newcattwo::orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcattwo = Newcattwo::find($id);
        return view('backend.newcattwos.edit', compact('newcattwo','newcattwos', 'newcatones'));
    }

    public function store(Request $request)
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
            $res = $file->storeAs('public/uploads', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }

        $data = [
            'newcatone_id' => $request->newcatone_id,
            'stt' => $request->stt,
            'hide_show' => $request->hide_show,
            'show_nav' => $request->show_nav,
            'img'  => $name_save
        ];
        $newcattwo = Newcattwo::create($data);
        $newcattwo->translations()->createMany($request->translation);
        if ($newcattwo) {
            alert()->success("Thành công",'Đã thêm danh mục');
            return redirect()->route('backend.newcattwo.index');
        }
            alert()->error("Lỗi",'Thêm danh mục thất bại');
            return redirect()->route('backend.newcattwo.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Newcattwo')->where('locale',session('locale'))->first()->id;
        $newcattwo = Newcattwo::find($id);
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
            $name_save = $newcattwo->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads', $name_save);
            $image_path_del = public_path().'/storage/uploads/'.$newcattwo->img;
            if (file_exists($image_path_del) && $newcattwo->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }

        $newcattwo->stt             = $request->stt;
        $newcattwo->newcatone_id    = $request->newcatone_id;
        $newcattwo->hide_show       = $request->hide_show;
        $newcattwo->show_nav        = $request->show_nav;
        $newcattwo->img             = $name_save;
        $newcattwo->translations()->update($request->translation);
        $newcattwo->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success('Thành công','Đã cập nhật danh mục');
        return redirect()->route('backend.newcattwo.index');

    }

    public function destroy(Request $request, $id)
    {
        $newcattwo = Newcattwo::find($id);
        if ($newcattwo) {
            if ($newcattwo->img != 'placeholder.png') {
                $image_path = public_path().'/storage/uploads/'.$newcattwo->img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $newcattwo->delete();
            $newcattwo->delete_trans()->delete();
            alert()->success("Thành công","Đã xóa danh mục");
            return redirect()->route('backend.newcattwo.index');
        }
            alert()->error("Lỗi","Xóa danh mục thất bại");
            return redirect()->route('backend.newcattwo.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = Newcattwo::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/'.$image->img;
                    if (file_exists($image_path)) {
                    unlink($image_path);
                }
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Newcattwo')->delete();
        Newcattwo::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các Danh mục đã chọn !']);
    }
    public function ChangeIsFeatured(Request $request){
        $newcattwo = Newcattwo::find($request->newcattwo_id);
        $newcattwo->is_featured = $request->is_featured;
        $newcattwo->save();
        return response()->json(['success'=>'Is Featured change successfully.']);
    }
    public function hideShow(Request $request){
        $newcattwo = Newcattwo::find($request->newcattwo_id);
        $newcattwo->hide_show = $request->hide_show;
        $newcattwo->save();
        return response()->json(['success'=>'Hide Show change successfully.']);
    }
    public function isNew(Request $request){
        $newcattwo = Newcattwo::find($request->newcattwo_id);
        $newcattwo->is_new = $request->is_new;
        $newcattwo->save();
        return response()->json(['success'=>'Is New change successfully.']);
    }
    public function changeStt(Request $request){
        $newcattwo = Newcattwo::find($request->newcattwo_id);
        $newcattwo->stt = $request->stt;
        $newcattwo->save();
        return response()->json(['success'=>'STT change successfully.']);
    }
}
