<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Recruitment;
use Cache;
use Validate;
use Translation;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class RecruitmentController extends ShareController
{
    public function index()
    {
        $recruitments = Recruitment::with('translations')->orderBy('stt','asc')->get();
        return view('backend.recruitments.index', compact('recruitments'));
    }
    public function create()
    {
        return view('backend.recruitments.create');
    }

    public function edit(Request $request, $id)
    {
        $recruitment = Recruitment::find($id);
        return view('backend.recruitments.edit', compact('recruitment'));
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
            $res = $file->storeAs('public/uploads/recruitments', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        $nowdate = Carbon::now()->toDateTimeString();
        if (!$request->published) {
            $nowdate;
        }
        $data = [
            'type' => $request->type,
            'stt' => $request->stt,
            'hide_show' => $request->hide_show,
            'is_new' => $request->is_new,
            'is_featured' => $request->is_featured,
            'quantity' => $request->quantity,
            'date_expired' => $request->date_expired,
            'date_expired' => Carbon::parse($request->date_expired),
            'img' => $name_save
        ];
        $recruitment = Recruitment::create($data);
        $recruitment->translations()->createMany($request->translation);

        if ($recruitment) {
            alert()->success('Thành công !','Đã thêm tin tuyển dụng !');
            return redirect()->route('backend.recruitment.index');
        }
            alert()->error('Thất bại !','Đã có lỗi xảy ra !');
            return redirect()->route('backend.recruitment.index');
    }
    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Recruitment')->where('locale',session('locale'))->first()->id;
        $recruitment = Recruitment::find($id);
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
            $name_save = $recruitment->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/recruitments', $name_save);
            $image_path_del = public_path().'/storage/uploads/recruitments/'.$recruitment->img;
            if (file_exists($image_path_del) && $recruitment->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }
        $recruitment->stt             = $request->stt;
        $recruitment->hide_show       = $request->hide_show;
        $recruitment->is_new          = $request->is_new;
        $recruitment->is_featured     = $request->is_featured;
        $recruitment->quantity        = $request->quantity;
        $recruitment->date_expired    = $request->date_expired;
        $recruitment->date_expired    = Carbon::parse($request->date_expired);
        $recruitment->img             = $name_save;
        $recruitment->translations()->update($request->translation);
        $recruitment->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !",'Đã cập nhật tin tuyển dụng !');
        return redirect()->route('backend.recruitment.index');
    }

    public function destroy(Request $request, $id)
    {
        $recruitment = Recruitment::find($id);
        if ($recruitment) {
            $image_path_del = public_path().'/storage/uploads/recruitments/'.$recruitment->img;
            if (file_exists($image_path_del) && $recruitment->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $recruitment->delete();
            $recruitment->delete_trans()->delete();
            alert()->success("Thành công !",'Đã xóa tin tuyển dụng !');
            return redirect()->route('backend.recruitment.index');
        }
            alert()->error("Thất bại !",'Tin tuyển dụng không tồn tại !');
            return redirect()->route('backend.recruitment.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Recruitment::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                $image_path = public_path().'/storage/uploads/recruitments/'.$image->img;
                if (file_exists($image_path) && $image->img != 'placeholder.png') {
                    unlink($image_path);
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Recruitment')->delete();
        Recruitment::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các bài viết đã chọn !']);
    }
    public function ChangeIsFeatured(Request $request){
        $recruitment = Recruitment::find($request->recruitment_id);
        $recruitment->is_featured = $request->is_featured;
        $recruitment->save();
        return response()->json(['success'=>'Recruitment Is Featured change successfully.']);
    }
    public function hideShow(Request $request){
        $recruitment = Recruitment::find($request->recruitment_id);
        $recruitment->hide_show = $request->hide_show;
        $recruitment->save();
        return response()->json(['success'=>'Recruitment Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $recruitment = Recruitment::find($request->recruitment_id);
        $recruitment->stt = $request->stt;
        $recruitment->save();
        return response()->json(['success'=>'Recruitment STT change successfully.']);
    }
}
