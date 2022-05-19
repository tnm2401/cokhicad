<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Page;
use Setting;
use Translation;
use Illuminate\Http\Request;
use Validator;
use Validate;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class PageController extends ShareController
{
    public function index()
    {
        $pages = Page::with('translations')->get();
        return view('backend.pages.index', compact('pages'));
    }

    public function create(){
        return view('backend.pages.create');
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
            $res = $file->storeAs('public/uploads/pages', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        if (!$request->published) {
            $published = Carbon::now();
        } else {
            $published = $request->published;
        }
        $data = [
            'type' => $request->type ?? false,
            'published' => $published,
            'hide_show' => $request->hide_show,
            'img' => $name_save,
        ];
        $page = Page::create($data);
        $page->translations()->createMany($request->translation);
        if ($page) {
            alert()->success('Thành công !','Đã thêm trang mới !');
            return redirect()->route('backend.page.index');
        }
            alert()->error('Lỗi !','Tạo trang thất bại !');
            return redirect()->route('backend.page.index');
    }

    public function edit(Request $request, $id)
    {
        $page = Page::find($id);
        return view('backend.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Page')->where('locale',session('locale'))->first()->id;
        $page = Page::find($id);
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
            $name_save = $page->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/pages', $name_save);
            $image_path_del = public_path().'/storage/uploads/pages/'.$page->img;
            if (file_exists($image_path_del) && $page->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            // delete thumbBE
            $img_name = $page->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = config('thumb.be_thumb.width').'x'.config('thumb.be_thumb.height');
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_medium = public_path().'/backend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
        }
        if (!$request->published) {
            $published = Carbon::now();
        } else {
            $published = $request->published;
        }
        $page->published  = $published;
        $page->type       = $request->type;
        $page->hide_show  = $request->hide_show;
        $page->img        = $name_save;
        $page->translations()->update($request->translation);
        $page->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !",'Đã cập nhật trang !');
        return redirect()->route('backend.page.index');
    }

    public function destroy(Request $request, $id)
    {
        $page = Page::find($id);
        if ($page) {
            $image_path_del = public_path().'/storage/uploads/pages/'.$page->img;
            if (file_exists($image_path_del) && $page->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            // delete thumbBE
            $img_name = $page->img;
            $find_ext_last_img = Str::replaceLast('.', '.', $img_name);
            $name_without_ext_img = Str::of($find_ext_last_img)->beforeLast('.');
            $ext = Str::of($find_ext_last_img)->afterLast('.');
            $img_size_medium = config('thumb.be_thumb.width').'x'.config('thumb.be_thumb.height');
            $img_size_del_medium = $name_without_ext_img.'-'.$img_size_medium.'.'.$ext;
            $image_path_frontend_medium = public_path().'/backend/thumb/'.$img_size_del_medium;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            $page->delete();
            $page->delete_trans()->delete();
            alert()->success("Thành công !", "Đã Xóa trang !");
            return redirect()->route('backend.page.index');
        }
            alert()->error("Lỗi !", "Xóa trang thất bại !");
            return redirect()->route('backend.page.index');
    }

    public function hideShow(Request $request){
        $page = Page::find($request->page_id);
        $page->hide_show = $request->hide_show;
        $page->save();
        return response()->json(['success'=>'Page Hide Show change successfully.']);
    }
}