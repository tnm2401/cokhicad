<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Translation;
use TagTranslation;
use Cache;
use Image;
use Validate;
use Validator;
use Carbon\Carbon;
use Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class TagController extends ShareController
{
    public function index()
    {
        $tags = Tag::with('translations')->with('tag_product')->with('tag_post')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('backend.tag.create');
    }

    public function edit(Request $request, $id)
    {
        $tag = tag::find($id);
        return view('backend.tag.edit', compact('tag'));
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
        $tag = new Tag();
        $tag->stt = $request->stt ?? false;
        $tag->hide_show = $request->hide_show ?? false;
        $tag->type = $request->type ?? false;
        $tag->save();
        $tag->translations()->createMany($request->translation);
        if ($tag) {
            alert()->success("Thành công !", "Đã thêm Tag !");
            return redirect()->route('backend.tag.index');
        }
            alert()->danger("Lỗi !", "Thêm Tag thất bại !");
            return redirect()->route('backend.tag.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = TagTranslation::where('tag_id',$id)->where('locale',session('locale'))->first()->id;
        $tag = Tag::find($id);
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
            'slug' => 'required|unique:tag_translations,slug,'.$id_unique_skip,
            'name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        $tag->stt       = $request->stt;
        $tag->hide_show = $request->hide_show;
        $tag->type      = $request->type;
        $tag->translations()->update($request->translation);
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        $tag->save();
        alert()->success("Thành công !","Đã cập nhật lại Tag !");
        return redirect()->route('backend.tag.index');
    }

    public function destroy(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $tag->delete_trans()->delete();
        alert()->success("Thành công !", "Đã Xóa Tag thành công !");
        return redirect()->route('backend.tag.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $translation = TagTranslation::whereIn('tag_id',explode(",",$ids))->delete();
        Tag::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function hideShow(Request $request){
        $tag = Tag::find($request->tag_id);
        $tag->hide_show = $request->hide_show;
        $tag->save();
        return response()->json(['success'=>'tag Hide Show change successfully.']);
    }

    public function changeStt(Request $request){
        $tag = Tag::find($request->tag_id);
        $tag->stt = $request->stt;
        $tag->save();
        return response()->json(['success'=>'tag STT change successfully.']);
    }
}
