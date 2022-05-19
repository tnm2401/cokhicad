<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Video;
use App\Models\Videocat;
use Cache;
use Translation;
use Validate;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class VideoController extends ShareController
{
    public function index()
    {
        $videocats = Videocat::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        $videos = Video::with('translations')->orderBy('stt', 'asc')->get();
        return view('backend.videos.index', compact('videos','videocats'));
    }
    public function create()
    {
        $videocats = Videocat::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.videos.create', compact('videocats'));
    }

    public function edit(Request $request, $id)
    {
        $video = Video::with('translations')->find($id);
        $videocats = Videocat::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.videos.edit', compact('video','videocats'));
    }

    public function store(Request $request)
    {
        $lang = [
            'vi.name.required' => 'Vui lòng nhập tên Video Tiếng Việt !',
            'en.name.required' => 'Vui lòng nhập tên Video Tiếng Anh !',
            'link.required' => 'Vui lòng nhập URL Video Youtube !',
            'link.unique' => 'URL Video Youtube đã tồn tại !',
            'img.image' => 'Vui lòng chọn đúng định dạng hình ảnh !',
            'img.mines' => 'Định dạng hợp lệ: jpeg,png,jpg,gif,svg !',
            'img.max' => 'Dung lượng hình ảnh tối đa là 20MB !',
        ];
        $validator = Validator::make(request()->translation, [
            '*.name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        $request->validate([
            'link' => 'required|unique:videos',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ], $lang);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/videos', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $url_video = $request->link;
        $code = Str::after($url_video, 'https://www.youtube.com/watch?v=');
        $data = [
            'stt' => $request->stt,
            'videocat_id' => $request->videocat,
            'url_code' => $code,
            'link' => $url_video,
            'is_featured' => $request->is_featured,
            'hide_show' => $request->hide_show,
            'img' => $name_save,
        ];
        $video = Video::create($data);
        $video->translations()->createMany($request->translation);

        if ($video) {
            alert()->success("Thành công !",'Đã thêm Video !');
            return redirect()->route('video.index');
        }
            alert()->error("Lỗi !",'Thêm video thất bại !');
            return redirect()->route('video.index');
    }
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Video Tiếng Việt !',
                'link.required' => 'Vui lòng nhập Link Video Youtube !',
                'link.unique' => 'URL Video Youtube đã tồn tại !',
                'img.image' => 'Vui lòng chọn đúng định dạng hình ảnh !',
                'img.mines' => 'Định dạng hợp lệ: jpeg,png,jpg,gif,svg !',
                'img.max' => 'Dung lượng hình ảnh tối đa là 20MB !',
            ];
        } else {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Video Tiếng Anh !',
                'link.required' => 'Vui lòng nhập Link Video Youtube !',
                'link.unique' => 'URL Video Youtube đã tồn tại !',
                'img.image' => 'Vui lòng chọn đúng định dạng hình ảnh !',
                'img.mines' => 'Định dạng hợp lệ: jpeg,png,jpg,gif,svg !',
                'img.max' => 'Dung lượng hình ảnh tối đa là 20MB !',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'name' => 'required',
        ],$lang);
        $request->validate([
            'link' => 'required|unique:videos,link,'.$id,
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ], $lang);

        if (!$request->hasFile('img')) {
            $name_save = $video->img;
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
            $image_path_del = public_path().'/storage/uploads/videos/'.$video->img;
            if (file_exists($image_path_del) && $video->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $img_name = $video->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = '370x250';
            $img_size_medium1 = '370x250';
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $img_size_del_medium1 = $name_without_ext_img.'-'.$img_size_medium1.'.'.$ext;
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            $image_path_frontend_medium1 = public_path().'/backend/thumb/'.$img_size_del_medium1;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            if (file_exists($image_path_frontend_medium1)) {
                unlink($image_path_frontend_medium1);
            }
        }
        $url_video = $request->link;
        $code = Str::after($url_video, 'https://www.youtube.com/watch?v=');
        $video->stt          = $request->stt;
        $video->videocat_id  = $request->videocat;
        $video->url_code     = $code;
        $video->link         = $url_video;
        $video->is_featured  = $request->is_featured;
        $video->hide_show    = $request->hide_show;
        $video->img          = $name_save;
        $video->translations()->update($request->translation);
        $video->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        if ($video->save()) {
            alert()->success("Thành công !",'Đã cập nhật Video !');
            return redirect()->route('video.index');
        }
            alert()->error("Thất bại !",'Đã có lỗi xảy ra !');
            return redirect()->route('video.index');
    }

    public function destroy(Request $request, $id)
    {
        $video = Video::find($id);
        if ($video) {
            if ($video) {
                if ($video->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/videos/'.$video->img;
                    unlink($image_path);
                }
                $img_name = $video->img;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '370x250';
                $img_size_medium = '370x250';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/backend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
            }
            $video->delete();
            $video->delete_trans()->delete();
            alert()->success("Thành công !",'Đã xóa Video !');
            return redirect()->route('video.index');
        }
            alert()->error("Lỗi !","Xóa Video thất bại !");
            return redirect()->route('video.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Video::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/videos/'.$image->img;
                    unlink($image_path);
                }
                $img_name = $image->img;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '370x250';
                $img_size_medium = '370x250';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/backend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Video')->delete();
        Video::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các Videos đã chọn !']);
    }
    public function hideShow(Request $request){
        $video = Video::find($request->video_id);
        $video->hide_show = $request->hide_show;
        $video->save();
        return response()->json(['success'=>'Video Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $video = Video::find($request->video_id);
        $video->stt = $request->stt;
        $video->save();
        return response()->json(['success'=>'Video STT change successfully.']);
    }
}
