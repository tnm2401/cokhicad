<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Slider;
use Gallery;
use Cache;
use Validate;
use Productsimage;
use Translation;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;


class GalleryController extends ShareController
{
    public function index()
    {
        $gallerys = Gallery::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.gallery.index', compact('gallerys'));
    }
    public function create()
    {
        return view('backend.gallery.create');
    }

    public function edit(Request $request, $id)
    {
        $gallery = Gallery::with('translations')->with('images')->find($id);
        $img = $gallery->images()->paginate(14);
        return view('backend.gallery.edit', compact('gallery','img'));
    }

    public function store(Request $request)
    {
        $lang = [
            '0.name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            '0.slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
            '0.slug.unique' => 'URL Tiếng Việt đã tồn tại !',

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
            $res = $file->storeAs('public/uploads/gallery',$name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $data = [
            'stt' => $request->stt,
            'hide_show' => $request->hide_show,
            'url' => $request->url ?? false,
            'img' => $name_save
        ];
        $gallery = Gallery::create($data);
        $gallery->translations()->createMany($request->translation);
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file){
                if($file->isValid()){
                    $full_name_img = $file->getClientOriginalName();
                    $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                    $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                    $ext = $file->getClientOriginalExtension();
                    $name_save_slug = Str::slug($name_without_ext, '-');
                    $current_time = Carbon::now()->format('Hs');
                    $name_img = $name_save_slug.'-'.$current_time.'.'.$ext;
                    $res = $file->storeAs('public/uploads/gallery', $name_img);
                    Productsimage::create([
                                            'product_id' => $gallery->id,
                                            'imgs' => $name_img,
                                            'type' => 3
                                         ]);
                }
            }
        }

        alert()->success("Thành công",'Đã thêm thương hiệu');
        return redirect()->route('backend.gallery.index');

    }
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $lang = [
            '*.name.required' => 'Vui lòng nhập tên !'
,
        ];
        $validator = Validator::make(request()->translation, [
            '*.name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if (!$request->hasFile('img')) {
            $name_save = $gallery->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/gallery', $name_save);
            $image_path_del = public_path().'/storage/uploads/gallery/'.$gallery->img;
            if (file_exists($image_path_del) && $gallery->img != 'placeholder.png') {
                unlink($image_path_del);
            }

                $img_name = $gallery->img;
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
        $gallery->hide_show         = $request->hide_show;
        $gallery->stt               = $request->stt;
        $gallery->img               = $name_save;

        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file){
                if($file->isValid()){
                    $full_name_img = $file->getClientOriginalName();
                    $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                    $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                    $ext = $file->getClientOriginalExtension();
                    $name_save_slug = Str::slug($name_without_ext, '-');
                    $current_time = Carbon::now()->format('Hs');
                    $name_img = $name_save_slug.'-'.$current_time.'.'.$ext;
                    $res = $file->storeAs('public/uploads/gallery', $name_img);

                    Productsimage::create([
                                            'product_id' => $gallery->id,
                                            'imgs' => $name_img,
                                            'type'=> 3
                                         ]);
                }
            }
        }
        $gallery->translations()->update($request->translation);
        $gallery->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Đã cập nhật slide");
        return redirect()->route('backend.gallery.index');


    }


    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            $image_path_del = public_path().'/storage/uploads/gallery/'.$gallery->img;
            if (file_exists($image_path_del) && $gallery->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $imgdetail =   Productsimage::whereIn('product_id',explode(",",$id))->whereType(3)->get();
            foreach($imgdetail as $image){
                $image_path = public_path().'/storage/uploads/gallery/'.$image->imgs;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
            Productsimage::whereIn('product_id',explode(",",$id))->whereType(2)->delete();

            $gallery->delete();
            $gallery->delete_trans()->delete();
            alert()->success("Thành công", "Đã xóa danh mục");
            return redirect()->route('backend.gallery.index');
        }
            alert()->error("Lỗi", "Xóa danh mục thất bại !");
            return redirect()->route('backend.gallery.index');

    }

    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = Gallery::whereIn('id',explode(",",$ids))->get();
        $imgdetail =   Productsimage::whereIn('product_id',explode(",",$ids))->whereType(3)->get();
        if ($ids) {
            foreach($imgdetail as $image){
                $image_path = public_path().'/storage/uploads/gallery/'.$image->imgs;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
            foreach($images as $image){
                $image_path = public_path().'/storage/uploads/gallery/'.$image->img;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
        }

        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Gallery')->delete();
        Gallery::whereIn('id',explode(",",$ids))->delete();
        Productsimage::whereIn('product_id',explode(",",$ids))->whereType(3)->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các Danh mục đã chọn !']);
    }

    public function hideShow(Request $request){
        $gallery = Gallery::find($request->gallery_id);
            $gallery->hide_show = $request->hide_show;
            $gallery->save();
            return response()->json(['success'=>'gallery Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $gallery = Gallery::find($request->gallery_id);
            $gallery->stt = $request->stt;
            $gallery->save();
            return response()->json(['success'=>'gallery STT change successfully.']);
    }

    public function delete($id){
        $image = Productsimage::find($id);
        if ($image) {
            $image_path_del = public_path().'/storage/uploads/gallery/'.$image->imgs;
            unlink($image_path_del);

            $imgs_name = $image->imgs;
            $find_ext_last = Str::replaceLast('.', '.', $imgs_name);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = Str::of($find_ext_last)->afterLast('.');
            $imgs_size_small = '92x60';
            $imgs_size_del_small = $name_without_ext.'-'.$imgs_size_small.'.'.$ext;
            $imgs_path_backend_small = public_path().'/backend/thumb/'.$imgs_size_del_small;
            if (file_exists($imgs_path_backend_small)) {
                unlink($imgs_path_backend_small);
            }
        }
        $image->delete($id);
        return response()->json(['status'=>true,'message'=>'Xoá thành công']);
    }
}
