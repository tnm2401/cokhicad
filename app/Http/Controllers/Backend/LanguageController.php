<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\ShareController;
use Footer;
use Language;
use Validate;
use Translation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class LanguageController extends ShareController
{

    public function index()
    {
        $language =  Language::all();
        return view('backend.language.index', compact('language'));
    }


    public function store(Request $request)
    {
        $language = new  Language();
        $language->name = $request->name ?? false;
        $language->flag = $request->flag ?? false;
        $language->locale = $request->locale ?? false;
        $language->save();
        alert()->success("Thành công", 'Đã thêm nội dung');
        return redirect()->route('backend.language.index');
    }

    public function update(Request $request, $id)
    {
        $language = Language::find($id);

        $language->name         = $request->name;
        $language->flag         = $request->flag;
        $language->locale      = $request->locale;
        $language->save();
        if ($language->save()) {
            alert()->success("Thành công", 'Đã cập nhật nội dung');
            return redirect()->route('backend.language.index');
        }
        alert()->error("Thất bại", 'Đã có lỗi xảy ra');
        return redirect()->route('backend.language.index');
    }

    public function destroy($id)
    {
        $language = Language::find($id);
        $countlang = Language::count();
        if ($countlang <= 1) {
            alert()->error("Lỗi", 'Phải có ít nhất một ngôn ngữ');
            return redirect()->route('backend.language.index');
        }
        $language->delete();
        alert()->success("Thành công", 'Đã xóa ngôn ngữ');
        return redirect()->route('backend.language.index');
    }
}
