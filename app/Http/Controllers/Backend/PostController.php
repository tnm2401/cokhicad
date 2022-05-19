<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Post;
use App\User;
use Newcatone;
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

class PostController extends ShareController
{
    public function index()
    {
        $posts = Post::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcatones = Newcatone::with('translations')->get();
        $newcattwos = Newcatone::with('translations')->get();
        return view('backend.posts.index', compact('posts','newcatones','newcattwos'));
    }
    public function select_option(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'newcatone') {
                $select_newcattwo = Newcattwo::with('translations')->where('newcatone_id',$data['code_id'])->orderBy('stt','asc')->orderBy('id','desc')->get();
                $output.='<option value="">Chọn cấp 2</option>';
                foreach ($select_newcattwo as $key => $newcattwo){
                    $output.='<option value="'.$newcattwo->id.'">'.$newcattwo->translations->name.'</option>';
                }
            }
        }
        echo $output;
    }
    public function select(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'newcatone') {
                $select_newcattwo = Newcattwo::with('translations')->where('newcatone_id',$data['code_id'])->orderBy('stt','asc')->orderBy('id','desc')->get();
                $output.='<option value="">Chọn cấp 2</option>';
                foreach ($select_newcattwo as $key => $newcattwo){
                    $output.='<option value="'.$newcattwo->id.'" data-id="'.$newcattwo->id.'">'.$newcattwo->translations->name.'</option>';
                }
            }
        }
        echo $output;
    }
    public function create()
    {
        $tags = Tag::with('translations')->whereType('post')->whereHide_show(1)->get();
        $newcatones = Newcatone::all();
        return view('backend.posts.create', compact('newcatones','tags'));
    }

    public function edit(Request $request, $id)
    {
        $newcatones = Newcatone::orderBy('stt','asc')->orderBy('id','desc')->get();
        $newcattwos = Newcattwo::orderBy('stt','asc')->orderBy('id','desc')->get();
        // lấy tất cả tag
        $tags1 = json_decode(Tag::whereType('post')->whereHide_show(1)->pluck('id'));
        // lấy tag của sản phẩm đó
        $tags2 = json_decode(PostTag::where('post_id',$id)->pluck('tag_id'));
        // lọc ra tag đã hiển thị
        $result = array_diff($tags1, $tags2);
        // show những tag còn lại
        $tags=Tag::with('translations')->where('type','post')->whereIn('id',$result)->get();
        $post = Post::with('get_tags')->find($id);
        return view('backend.posts.edit', compact('newcatones','newcattwos','post','tags'));
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
            $res = $file->storeAs('public/uploads/post', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }

        $data = [
            'newcatone_id' => $request->newcatone,
            'newcattwo_id' => $request->newcattwo,
            'stt' => $request->stt,
            'is_featured' => $request->is_featured ?? false,
            'is_new' => $request->is_new ?? true,
            'hide_show' => $request->hide_show,
            'img' => $name_save,
        ];
        $post = Post::create($data);
        $post->translations()->createMany($request->translation);
        if($request->tags){
            for ($i = 0; $i < count($request->tags); $i++) {
                if (TagTranslation::where('tag_id', '=', $request->tags[$i])->exists()) {
                    // trùng tag thì bỏ
                    // đẩy data vào bảng tag_product ( trùng )
                    $posttag_default = new PostTag();
                    $posttag_default->tag_id = json_decode($request->tags[$i]);
                    $posttag_default->post_id = $post->id;
                    $posttag_default->save();
                    //done
                     } else{
                    //  insert data vào tag và translation_tag
                    $tags = new  Tag();
                    $tags->type = 'product' ?? false;
                    $tags->hide_show = true;
                    $tags->stt = true;
                    $tags->save();
                    //done
                    // đẩy data vào tag_product ( k trùng)
                    $posttag= new PostTag();
                    $posttag->tag_id = $tags->id;
                    $posttag->post_id = $post->id;
                    $posttag->save();
                    //done
                    //đẩy tag vào bảng dịch ( lấy theo số lượng ngôn ngữ hiện có)
                    $language = Language::get();
                    foreach($language as $lang){
                    $tag_tran = new TagTranslation();
                    $tag_tran->tag_id = $tags->id;
                    $tag_tran->locale = $lang->locale;
                    $tag_tran->name = $request->tags[$i];
                    $tag_tran->slug = Str::slug($tag_tran->name);
                    $tag_tran->save();
                    //done
                    }
                }
            }
        }
        if ($post) {
            alert()->success('Thành công !','Đã thêm tin tức mới !');
            return redirect()->route('backend.post.index');
        }
            alert()->error('Lỗi !','Thêm tin tức thất bại !');
            return redirect()->route('backend.post.index');
    }
    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Post')->where('locale',session('locale'))->first()->id;
        $post = Post::find($id);
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
            $res = $file->storeAs('public/uploads/post', $name_save);
            $image_path_del = public_path().'/storage/uploads/post/'.$post->img;
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
        $post->newcatone_id    = $request->newcatone;
        $post->newcattwo_id    = $request->newcattwo;
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
        if($request->tags){
            $posttag_default_old = PostTag::where('post_id',$post->id)->delete(); // lấy data cũ và xóa
            for ($i = 0; $i < count($request->tags); $i++) {
                // dd($request->tags);
                if (TagTranslation::where('tag_id', '=', $request->tags[$i])->exists()) {
                    // trùng tag thì bỏ
                    // // đẩy data vào bảng tag_product ( trùng )
                    $posttag_default = new PostTag();
                    $posttag_default->tag_id = json_decode($request->tags[$i]);
                    $posttag_default->post_id = $post->id;
                    $posttag_default->save();
                    // //done
                    } else {
                    //  insert data vào tag và translation_tag
                    $tags = new  Tag();
                    $tags->type = 'post' ?? false;
                    $tags->hide_show = true;
                    $tags->stt = true;
                    $tags->save();
                    //done
                    // đẩy data vào tag_product ( k trùng)
                    $posttag= new PostTag();
                    $posttag->tag_id = $tags->id;
                    $posttag->post_id = $post->id;
                    $posttag->save();
                    //done
                    //đẩy tag vào bảng dịch ( lấy theo số lượng ngôn ngữ hiện có)
                    $language = Language::get();
                    foreach($language as $lang){
                    $tag_tran = new TagTranslation();
                    $tag_tran->tag_id = $tags->id;
                    $tag_tran->locale = $lang->locale;
                    $tag_tran->name = $request->tags[$i];
                    $tag_tran->slug = Str::slug($tag_tran->name);
                    $tag_tran->save();
                    //done
                    }
                }
            }
        }
        alert()->success("Thành công !",'Đã cập nhật tin tức !');
        return redirect()->route('backend.post.index');
    }
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            if ($post->img != 'placeholder.png') {
                $image_path = public_path().'/storage/uploads/post/'.$post->img;
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
            alert()->success("Thành công !",'Đã xóa tin tức !');
            return redirect()->route('backend.post.index');
        }
            alert()->error("Lỗi !",'Không Xóa được tin tức !');
            return redirect()->route('backend.post.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Post::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/post/'.$image->img;
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
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Post')->delete();
        Post::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function ChangeIsFeatured(Request $request){
        $post = Post::find($request->post_id);
        $post->is_featured = $request->is_featured;
        $post->save();
        return response()->json(['success'=>'Is Featured change successfully.']);
    }
    public function hideShow(Request $request){
        $post = Post::find($request->post_id);
        $post->hide_show = $request->hide_show;
        $post->save();
        return response()->json(['success'=>'Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $post = Post::find($request->post_id);
        $post->stt = $request->stt;
        $post->save();
        return response()->json(['success'=>'STT change successfully.']);
    }
}
