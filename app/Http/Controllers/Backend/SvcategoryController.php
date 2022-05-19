<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use App\Models\Svcategory;
use Cache;
use Validator;
use Validate;
use Translation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SvcategoryController extends ShareController
{
    public function index()
    {
        $svcategories = Svcategory::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.svcategories.index', compact('svcategories'));
    }

    public function create()
    {
        return view('backend.svcategories.create');
    }

    public function edit(Request $request, $id)
    {
        $svcategory = Svcategory::find($id);
        return view('backend.svcategories.edit', compact('svcategory'));
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
            $res  = $file->storeAs('public/uploads/svcategory', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $svcategory = new  Svcategory();
        $svcategory->stt = $request->stt ?? false;
        $svcategory->hide_show = $request->hide_show ?? false;
        $svcategory->is_featured = $request->is_featured ?? false;
        $svcategory->img = $name_save ?? false;
        $svcategory->save();
        $svcategory->translations()->createMany($request->translation);



        if ($svcategory) {
            alert()->success("Thành công",'Đã thêm danh mục dịch vụ');
            return redirect()->route('backend.svcategory.index');
        }
            alert()->error("Thất bại",'Thêm danh mục dịch vụ thất bại !!!');
            return redirect()->route('backend.svcategory.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Svcategory')->where('locale',session('locale'))->first()->id;
        $svcategory = Svcategory::find($id);
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
            $name_save = $svcategory->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/svcategory', $name_save);
            $image_path_del = public_path().'/storage/uploads/svcategory/'.$svcategory->img;
            if (file_exists($image_path_del) && $svcategory->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }
        $svcategory                  = Svcategory::find($id);
        $svcategory->stt             = $request->stt;
        $svcategory->hide_show       = $request->hide_show;
        $svcategory->is_featured     = $request->is_featured;
        $svcategory->img             = $name_save;
        $svcategory->translations()->update($request->translation);
        $svcategory->save();
        alert()->success("Thành công",'Đã cập nhật danh mục dịch vụ');
        return redirect()->route('backend.svcategory.index');
    }

    public function destroy(Request $request, $id)
    {
        $svcategory = Svcategory::find($id);
        if ($svcategory) {
            $image_path_del = public_path().'/storage/uploads/svcategory/'.$svcategory->img;
            if (file_exists($image_path_del) && $svcategory->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $svcategory->delete();
            $svcategory->delete_trans()->delete();
            alert()->success("Thành công",'Đã xóa danh mục dịch vụ');
            return redirect()->route('backend.svcategory.index');
        }
            alert()->error("Lỗi",'Xóa danh mục dịch vụ thất bại');
            return redirect()->route('backend.svcategory.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = Svcategory::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image) {
                $image_path = public_path().'/storage/uploads/svcategory/'.$image->img;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Svcategory')->delete();
        Svcategory::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các danh mục đã chọn !']);
    }
    public function hideShow(Request $request){
        $svcategory = Svcategory::find($request->svcategory_id);
        $svcategory->hide_show = $request->hide_show;
        $svcategory->save();
        return response()->json(['success'=>'Svcategory Hide Show change successfully.']);
    }
    public function ChangeIsFeatured(Request $request){
        $svcategory = Svcategory::find($request->svcategory_id);
        $svcategory->is_featured = $request->is_featured;
        $svcategory->save();
        return response()->json(['success'=>'Svcategory Is Featured change successfully.']);
    }
    public function changeStt(Request $request){
        $svcategory = Svcategory::find($request->svcategory_id);
        $svcategory->stt = $request->stt;
        $svcategory->save();
        return response()->json(['success'=>'Svcategory STT change successfully.']);
    }
}
