<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Contact;
use Validate;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ContactController extends ShareController
{
    public function edit(Request $request)
    {
        $contact = Contact::first();
        return view('backend.contact.edit', compact('contact'));
    }
    public function update(Request $request)
    {
        $contact = Contact::first();
        $lang = [
            'name_vi.required' => 'Vui lòng nhập Tên Trang Tiếng Việt !',
            'name_en.required' => 'Vui lòng nhập Tên Trang Tiếng Anh !',
            'name_cn.required' => 'Vui lòng nhập Tên Trang Tiếng Trung !',
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
        if ($request->hasFile('img')){
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads', $name_save);
            $image_path_del = public_path().'/storage/uploads/'.$contact->img;
            if (file_exists($image_path_del) && $contact->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        } elseif (!$contact->img){
            $name_save = 'placeholder.png';
        } else {
            $name_save = $contact->img;
        }
        $contact->type            = $request->type;
        $contact->hide_show       = $request->hide_show;
        $contact->name_vi         = $request->name_vi;
        $contact->name_en         = $request->name_en;
        $contact->name_cn         = $request->name_cn;
        $contact->descriptions_vi = $request->descriptions_vi;
        $contact->descriptions_en = $request->descriptions_en;
        $contact->descriptions_cn = $request->descriptions_cn;
        $contact->content_vi      = $request->content_vi;
        $contact->content_en      = $request->content_en;
        $contact->content_cn      = $request->content_cn;
        $contact->title_vi        = $request->title_vi;
        $contact->title_en        = $request->title_en;
        $contact->title_cn        = $request->title_cn;
        $contact->keywords_vi     = $request->keywords_vi;
        $contact->keywords_en     = $request->keywords_en;
        $contact->keywords_cn     = $request->keywords_cn;
        $contact->description_vi  = $request->description_vi;
        $contact->description_en  = $request->description_en;
        $contact->description_cn  = $request->description_cn;
        $contact->img             = $name_save;
        $contact->save();
        if ($contact->save()) {
            return redirect()->route('backend.contact.edit')->with('success','Cập nhật thông tin liên hệ thành công !');
        }
            return redirect()->route('backend.contact.edit')->with('success','Cập nhật thông tin liên hệ lỗi !');
    }
}