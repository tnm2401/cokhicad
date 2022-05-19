<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Author;
use Validate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends ShareController
{
    public function edit(Request $request)
    {
        $author = Author::first();
        return view('backend.author.edit', compact('author'));
    }
    public function update(Request $request)
    {
        $author = Author::first();
        $lang = [
            'name_vi.required' => 'Vui lòng nhập Tên Tác giả Tiếng Việt !',
            'name_en.required' => 'Vui lòng nhập Tên Tác giả Tiếng Anh !',
            'name_cn.required' => 'Vui lòng nhập Tên Tác giả Tiếng Trung !',
            'img.image' => 'Vui lòng chọn file là hình ảnh !',
            'img.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'img.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
        ];
        $request->validate([
            'name_vi' => 'required',
            'name_en' => 'required',
            'name_cn' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
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
            $res = $file->storeAs('public/uploads', $name_save);
            $image_path_del = public_path().'/storage/uploads/'.$author->img;
            if (file_exists($image_path_del) && $author->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }elseif(!$author->img){
            $name_save = 'placeholder.png';
        }else{
            $name_save = $author->img;
        }
        if (!$request->published) {
            $published = Carbon::now();
        } else {
            $published = $request->published;
        }
        $author->published     = $published;
        $author->type          = $request->type;
        $author->hide_show     = $request->hide_show;
        $author->name_vi       = $request->name_vi;
        $author->name_en       = $request->name_en;
        $author->name_cn       = $request->name_cn;
        $author->content_vi    = $request->content_vi;
        $author->content_en    = $request->content_en;
        $author->content_cn    = $request->content_cn;
        $author->link_group    = $request->link_group;
        $author->link_author   = $request->link_author;
        $author->namebuttonone = $request->namebuttonone;
        $author->namebuttontwo = $request->namebuttontwo;
        $author->img           = $name_save;
        $author->save();
        if ($author->save()) {
            return redirect()->route('backend.author.edit')->with('success','Cập nhật thông tin Tác giả thành công !');
        }
            return redirect()->route('backend.author.edit')->with('success','Cập nhật thông tin Tác giả lỗi !');
    }
}