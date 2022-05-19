<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Setting;
use Validate;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class SettingController extends ShareController
{
    public function edit(Request $request){
        $setting = Setting::with('translations')->first();
        return view('backend.settings.edit', compact('setting'));
    }
    public function update(Request $request){
        $setting = Setting::first();
        $lang = [

            'img.image' => 'Vui lòng chọn file là hình ảnh !',
            'img.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'img.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
            'logoindex.image' => 'Vui lòng chọn file là hình ảnh !',
            'logoindex.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'logoindex.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
            'favicon.image' => 'Vui lòng chọn file là hình ảnh !',
            'favicon.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'favicon.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
            'logoadmin.image' => 'Vui lòng chọn file là hình ảnh !',
            'logoadmin.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'logoadmin.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
        ];
        $request->validate([

            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'logoindex' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
            'logoadmin' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
        ], $lang);
        if ($request->hasFile('favicon')){
                $file = $request->file('favicon');
                $full_name_img = $file->getClientOriginalName();
                $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = $file->getClientOriginalExtension();
                $name_save_slug = Str::slug($name_without_ext, '-');
                $current_time = Carbon::now()->format('Hs');
                $name_save_favicon = $name_save_slug.'-'.$current_time.'.'.$ext;
                $res = $file->storeAs('public/uploads/setting', $name_save_favicon);
                $image_path_del = public_path().'/storage/uploads/setting/'.$setting->favicon;
                if (file_exists($image_path_del) && $setting->favicon != 'placeholder.png') {
                    unlink($image_path_del);
                }
            } elseif (!$setting->favicon) {
                $name_save_favicon = 'placeholder.png';
            } else {
                $name_save_favicon = $setting->favicon;
            }
            if ($request->hasFile('logoindex')){
                $file = $request->file('logoindex');
                $full_name_img = $file->getClientOriginalName();
                $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = $file->getClientOriginalExtension();
                $name_save_slug = Str::slug($name_without_ext, '-');
                $current_time = Carbon::now()->format('Hs');
                $name_save_logoindex = $name_save_slug.'-'.$current_time.'.'.$ext;
                $res = $file->storeAs('public/uploads/setting', $name_save_logoindex);
                $image_path_del = public_path().'/storage/uploads/setting/'.$setting->logoindex;
                if (file_exists($image_path_del) && $setting->logoindex != 'placeholder.png') {
                    unlink($image_path_del);
                }
            } elseif (!$setting->logoindex){
                $name_save_logoindex = 'placeholder.png';
            } else {
                $name_save_logoindex = $setting->logoindex;
            }
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $full_name_img = $file->getClientOriginalName();
                $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = $file->getClientOriginalExtension();
                $name_save_slug = Str::slug($name_without_ext, '-');
                $current_time = Carbon::now()->format('Hs');
                $name_save_img = $name_save_slug.'-'.$current_time.'.'.$ext;
                $res = $file->storeAs('public/uploads/setting', $name_save_img);
                $image_path_del = public_path().'/storage/uploads/setting/'.$setting->img;
                if (file_exists($image_path_del) && $setting->img != 'placeholder.png') {
                    unlink($image_path_del);
                }
            } elseif (!$setting->img){
                $name_save_img = 'placeholder.png';
            } else {
                $name_save_img = $setting->img;
            }


            $setting->facebook                = $request->facebook;
            $setting->twitter                 = $request->twitter;
            $setting->youtube                 = $request->youtube;
            $setting->whatsapp                = $request->whatsapp;
            $setting->instagram               = $request->instagram;
            $setting->viber                   = $request->viber;
            $setting->uidfacebookadmin        = $request->uidfacebookadmin;
            $setting->appidfb                 = $request->appidfb;
            $setting->codehead                = $request->codehead;
            $setting->codebody                = $request->codebody;
            $setting->idanalytics             = $request->idanalytics;
            $setting->googlesiteverification  = $request->googlesiteverification;
            $setting->latitude                = $request->latitude;
            $setting->longitude               = $request->longitude;
            $setting->email                   = $request->email;
            $setting->website                 = $request->website;
            $setting->web                     = $request->web;
            $setting->hotline_1               = $request->hotline_1;
            $setting->hotline_2               = $request->hotline_2;
            $setting->hotline_3               = $request->hotline_3;
            $setting->href_1                  = $request->href_1;
            $setting->href_2                  = $request->href_2;
            $setting->href_3                  = $request->href_3;
            $setting->favicon                 = $name_save_favicon;
            $setting->img                     = $name_save_img;
            $setting->logoindex               = $name_save_logoindex;
            $setting->lang                    = $request->lang;
            $setting->author                  = $request->author;
            $setting->robots                  = $request->robots;
            $setting->maps                    = $request->maps;
            $setting->maps_1                  = $request->maps_1;
            $setting->save();
            $setting->translations()->update($request->translation);
            if ($setting->save()){
                alert()->success("Thành công",'Đã cập nhật thông tin');
                return redirect()->route('backend.setting.edit');
            }
                alert()->error("Thất bại",'Đã có lỗi xảy ra');
                return redirect()->route('backend.setting.edit');
    }
}
