<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Post;
use App\User;
use Svcategory;
use Servi;
use Newcattwo;
use Tag;
use Translation;
use PostTag;
use TagTranslation;
use Cache;
use Language;
use Image;
use Validate;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ServiController extends ShareController
{
    public function index()
    {
        $servi = Servi::get();
        $svcates = Svcategory::get();
        return view('backend.servis.index', compact('servi','svcates'));
    }

    public function create()
    {
        $svcates = Svcategory::all();
        return view('backend.servis.create', compact('svcates'));
    }

    public function edit(Request $request, $id)
    {
        $svcates = Svcategory::orderBy('stt','asc')->orderBy('id','desc')->get();
        $servi = Servi::find($id);
        return view('backend.servis.edit', compact('svcates','servi'));
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
            // $image = $request->file('img');
            // $input['file'] = time().'.'.$image->getClientOriginalExtension();
            // $imgFile = Image::make($image->getRealPath());
            // $imgFile->text('© 2019-2022 AIB.vn - All Rights Reserved', 750, 250, function($font) {
            // $font->size(12);
            // $font->color('#ffffff');
            // $font->align('center');
            // $font->valign('top');
            // $font->angle(45);
            // })->save(public_path('/uploads').'/'.$input['file']);
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/servis', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }

        $data = [
            'svcategory_id' => $request->svcate,
            'stt' => $request->stt,
            'is_featured' => $request->is_featured ?? false,
            'is_new' => $request->is_new ?? true,
            'hide_show' => $request->hide_show,
            'img' => $name_save,
            'view_count' => false
        ];
        $servis = Servi::create($data);
        $servis->translations()->createMany($request->translation);

        if ($servis) {
            alert()->success('Thành công !','Đã thêm dịch vụ mới !');
            return redirect()->route('backend.servi.index');
        }
            alert()->error('Lỗi !','Thêm dịch vụ thất bại !');
            return redirect()->route('backend.servi.index');
    }
    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Servi')->where('locale',session('locale'))->first()->id;
        $post = Servi::find($id);
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
            $name_save = $post->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/servis', $name_save);
            $image_path_del = public_path().'/storage/uploads/servis/'.$post->img;
            if (file_exists($image_path_del) && $post->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $img_name = $post->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = '370x250';
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
        }
        $post->stt             = $request->stt;
        $post->svcategory_id   = $request->svcate;
        $post->is_featured     = $request->is_featured;
        $post->is_new          = $request->is_new;
        $post->hide_show       = $request->hide_show;
        $post->img             = $name_save;
        $post->translations()->update($request->translation);
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        $post->save();
        alert()->success("Thành công !",'Đã cập nhật dịch vụ !');
        return redirect()->route('backend.servi.index');
    }
    public function destroy(Request $request, $id)
    {
        $post = Servi::find($id);
        if ($post) {
            if ($post->img != 'placeholder.png') {
                $image_path = public_path().'/storage/uploads/servis/'.$post->img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $img_name = $post->img;
            $find_ext_last = Str::replaceLast('.', '.', $img_name);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = Str::of($find_ext_last)->afterLast('.');
            $img_size_small = '370x250';
            $img_size_medium = '400x270';
            $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
            $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_small)) {
                unlink($image_path_frontend_small);
            }
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            $post->delete();
            $post->delete_trans()->delete();
            alert()->success("Thành công !",'Đã xóa dịch vụ !');
            return redirect()->route('backend.servi.index');
        }
            alert()->error("Lỗi !",'Không Xóa được dịch vụ !');
            return redirect()->route('backend.servi.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Servi::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/servis/'.$image->img;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $img_name = $image->img;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '370x250';
                $img_size_medium = '400x270';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/post/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/frontend/thumb/post/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Servi')->delete();
        Servi::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function ChangeIsFeatured(Request $request){
        $post = Servi::find($request->servi_id);
        $post->is_featured = $request->is_featured;
        $post->save();
        return response()->json(['success'=>'Is Featured change successfully.']);
    }
    public function hideShow(Request $request){
        $post = Servi::find($request->servi_id);
        $post->hide_show = $request->hide_show;
        $post->save();
        return response()->json(['success'=>'Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $post = Servi::find($request->servi_id);
        $post->stt = $request->stt;
        $post->save();
        return response()->json(['success'=>'STT change successfully.']);
    }
}
