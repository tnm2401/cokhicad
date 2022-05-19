<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\ShareController;
use Footer;
use Validate;
use Hideshow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class HideshowController extends ShareController
{

    public function index()
    {
        $menu =  Hideshow::orderby('id','asc')->get();
        return view('backend.hideshow.index', compact('menu'));
    }


    public function store(Request $request)
    {
        $hideshow = new  Hideshow();
        $hideshow->name = $request->name ?? false;
        $hideshow->hide_show = true;
        $hideshow->type = $request->type ;
        $hideshow->save();
        alert()->success("Thành công", 'Đã thêm nội dung');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $hideshow = Hideshow::find($id);

        $hideshow->name         = $request->name;

        $hideshow->save();
        if ($hideshow->save()) {
            alert()->success("Thành công", 'Đã cập nhật nội dung');
            return redirect()->back();

        }
        alert()->error("Thất bại", 'Đã có lỗi xảy ra');
        return redirect()->back();
    }


    public function hideShow(Request $request){
        $hideshow = Hideshow::find($request->hide_show_id);
        $hideshow->hide_show = $request->hide_show;
        $hideshow->save();
        return response()->json(['success'=>'Menu Hide Show change successfully.']);
    }

    public function hideAll(Request $request){
        if($request->ids){
            $ids = $request->ids;
          $showall =  Hideshow::whereIn('id',explode(",",$ids))->get();
          foreach($showall as $show){
            $show ->hide_show = '0';
            $show->save();
        }
        return response()->json(['status'=>true,'message'=>'Đã cập nhật lại menu !']);
        }
        else{
            $hideall = Hideshow::all();
            foreach($hideall as $hide){
                $hide ->hide_show = '0';
                $hide->save();
            }
            alert()->success("Thành công","Đã tắt tất cả menu");
            return redirect()->back();
        }
    }

    public function showAll(Request $request){

        if($request->ids){
            $ids = $request->ids;
          $showall =  Hideshow::whereIn('id',explode(",",$ids))->get();
          foreach($showall as $show){
            $show ->hide_show = '1';
            $show->save();
        }
        return response()->json(['status'=>true,'message'=>'Đã cập nhật lại menu !']);
        }
        else{
        $showall = Hideshow::all();
        foreach($showall as $show){
            $show ->hide_show = '1';
            $show->save();
        }
        alert()->success("Thành công","Đã bật tất cả menu");
        return redirect()->back();
        }

    }

}
