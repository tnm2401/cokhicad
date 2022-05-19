<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Slider;
use Cache;
use Validate;
use Validator;
use Translation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class SliderController extends ShareController
{
    public function index()
    {
        $sliders = Slider::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.sliders.index', compact('sliders'));
    }
    public function create()
    {
        return view('backend.sliders.create');
    }

    public function edit(Request $request, $id)
    {
        $slider = Slider::with('translations')->find($id);
        return view('backend.sliders.edit', compact('slider'));
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
            $res = $file->storeAs('public/uploads/slides',$name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $data = [
            'stt' => $request->stt,
            'hide_show' => $request->hide_show,
            'url' => $request->url ?? '',
            'img' => $name_save
        ];
        $slider = Slider::create($data);
        $slider->translations()->createMany($request->translation);
        alert()->success("Thành công !",'Đã thêm Slider !');
        return redirect()->route('backend.slider.index');

    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
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
            $name_save = $slider->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/slides', $name_save);
            $image_path_del = public_path().'/storage/uploads/slides/'.$slider->img;
            if (file_exists($image_path_del) && $slider->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $img_name = $slider->img;
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
        $slider->hide_show = $request->hide_show;
        $slider->stt       = $request->stt;
        $slider->url       = $request->url;
        $slider->img       = $name_save;
        $slider->translations()->update($request->translation);
        $slider->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !","Đã cập nhật Slider !");
        return redirect()->route('backend.slider.index');
    }
    public function destroy(Request $request, $id)
    {
        $slider = Slider::find($id);
            $img_name = $slider->img;
            $find_ext_last = Str::replaceLast('.', '.', $img_name);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = Str::of($find_ext_last)->afterLast('.');
            $img_size_medium = '1440x520';
            $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
            $image_path_del = public_path().'/storage/uploads/slides/'.$slider->img;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_del) && $slider->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            $slider->delete();
            $slider->delete_trans()->delete();
            alert()->success("Thành công !",'Đã Xóa Slider !');
            return redirect()->route('backend.slider.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Slider::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                // img index
                $image_path = public_path().'/storage/uploads/slides/'.$image->img;
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
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Slider')->delete();
        Slider::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function hideShow(Request $request){
        $slider = Slider::find($request->slider_id);
        $slider->hide_show = $request->hide_show;
        $slider->save();
        return response()->json(['success'=>'Slider Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $slider = Slider::find($request->slider_id);
        $slider->stt = $request->stt;
        $slider->save();
        return response()->json(['success'=>'Slider STT change successfully.']);
    }
}
