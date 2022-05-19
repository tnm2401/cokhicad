<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use Setting;
use App\Models\Role;
use Illuminate\Support\Str;
use Validate;
use Auth;

class RoleController extends ShareController
{
    public function index(){
        $roles = Role::with(['user'])->get()->toArray();
        $setting = Setting::get()->first();

    	return view('backend.roles.index',compact('setting','roles'));
    }
    public function create(){
    	$setting = Setting::get()->first();
    	return view('backend.roles.create',compact('setting'));
    }

    public function store(Request $request) // tạo mới
    {
        $lang = [
            'name.required'     => 'Vui lòng nhập Tên nhóm quyền !',
            'name.min'     => 'Vui lòng nhập Tối thiểu :min ký tự !',
            'name.max'     => 'Vui lòng nhập Tối đa :max ký tự !',
            'description.required'     => 'Vui lòng nhập mô tả nhóm quyền !',
        ];
        $request->validate([
            'name' => 'required|min:3|max:50',
            'description'  => 'required',
        ], $lang);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name,'-'),
            // 'permissions' => $request->permissions,
            'permissions' => json_encode($request->permission),
            'created_by' => Auth::id(),
        ];
        if ($role = Role::create($data)) {
            alert()->success("Thành công",'Đã tạo nhóm quyền mới');
        	return redirect()->route('role.index');
        }
            alert()->error("Thất bại",'Chưa tạo được nhóm quyền');
        	return redirect()->route('role.index');

    }
    public function edit(Request $request, $id){
    	$role = Role::find($id);
        // dd($role->permissions);
    	$setting = Setting::get()->first();
    	return view('backend.roles.edit',compact('setting','role'));
    }
    public function update(Request $request, $id){
    	$role = Role::find($id);
    	$setting = Setting::get()->first();
    	$lang = [
    	    'name.required'     => 'Vui lòng nhập Tên nhóm quyền !',
    	    'name.min'     => 'Vui lòng nhập Tối thiểu :min ký tự !',
    	    'name.max'     => 'Vui lòng nhập Tối đa :max ký tự !',
    	    'description.required'     => 'Vui lòng nhập mô tả nhóm quyền !',
    	];
    	$request->validate([
    	    'name' => 'required|min:3|max:50',
    	    'description'  => 'required',
    	], $lang);
    	$role->name        = $request->name;
        $role->description = $request->description;
        $role->slug        = Str::slug($request->name,'-');
        $role->permissions  = json_encode($request->permission);

        $role->updated_by  = Auth::id();
        $role->save();
        alert()->success("Thành công",'Đã cập nhật lại nhóm quyền');
    	return redirect()->route('role.index');
    }
    public function destroy(Request $request, $id){
    	$role = Role::find($id);
        if ($role) {
            $role->delete();
            alert()->success("Thành công",'Đã xóa nhóm quyền');
            return redirect()->route('role.index');
        }
        alert()->error("Thất bại",'Chưa xóa được nhóm quyền');
        return redirect()->route('role.index');
    }

    public function deletemultiple(Request $request){
        $ids = $request->ids;
        Role::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các quyền đã chọn !']);
    }
}
