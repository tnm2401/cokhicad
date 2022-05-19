<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\ShareController;
use Footer;
use Thumb;
use Validate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ThumbController extends ShareController
{

    public function index()
    {
        $thumb = Thumb::all();
        return view('backend.thumb.index', compact('thumb'));
    }

    public function store(Request $request)
    {
        $lang = [
            'name.required' => 'Vui lòng nhập Tên kích thước !',
            'type.required' => 'Vui lòng nhập type !',
            'type.unique' => 'Type đã tồn tại !',
            'width.required' => 'Vui lòng nhập chiều rộng - Width (px) !',
            'height.required' => 'Vui lòng nhập chiều cao - Height (px) !',
        ];
        $request->validate([
            'name' => 'required',
            'width' => 'required',
            'height' => 'required',
            'type' => 'required|unique:thumbs',
        ], $lang);
        $thumb = new Thumb();
        $thumb->type = Str::slug($request->name,'_');
        $thumb->name = $request->name;
        $thumb->height = $request->height;
        $thumb->width = $request->width;
        $thumb->save();
        alert()->success("Thành công !", 'Đã thêm kích thước !');
        return redirect()->route('backend.thumb.index');
    }

    public function update(Request $request, $id)
    {
        $thumb = Thumb::find($id);
        $lang = [
            'name.required' => 'Vui lòng nhập Tên kích thước !',
            'type.unique' => 'Type đã tồn tại !',
            'width.required' => 'Vui lòng nhập chiều rộng - Width (px) !',
            'height.required' => 'Vui lòng nhập chiều cao - Height (px) !',
        ];
        $request->validate([
            'name' => 'required',
            'width' => 'required',
            'height' => 'required',
            'type' => 'unique:thumbs,type,'.$id,
        ], $lang);
        $thumb->type   = Str::slug($request->type,'_');
        $thumb->name   = $request->name;
        $thumb->width  = $request->width;
        $thumb->height = $request->height;
        $thumb->save();
        if ($thumb->save()) {
            alert()->success("Thành công !", 'Đã cập nhật kích thước !');
            return redirect()->route('backend.thumb.index');
        }
        alert()->error("Thất bại !", 'Đã có lỗi xảy ra !');
        return redirect()->route('backend.thumb.index');
    }

    public function destroy($id)
    {
        $thumb = Thumb::find($id);
        $thumb->delete();
        alert()->success("Thành công !", 'Đã Xóa kích thước !');
        return redirect()->route('backend.thumb.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        Thumb::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
}