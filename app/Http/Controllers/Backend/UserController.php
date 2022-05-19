<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use App\User;
use App\Models\Role;
use Validate;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class UserController extends ShareController
{
    public function index()
    {
        $users = User::orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.users.index', compact('users'));
    }
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('backend.users.create', compact('users','roles'));
    }

    public function editinfo(Request $request)
    {
        $user =   User::find(auth()->user()->id);
        $roles = Role::all();
        return view('backend.users.editinfo', compact('roles','user'));
    }

    public function editpassword(Request $request)
    {
        // $user = User::find($id);
        return view('backend.users.editpassword');
    }

    public function store(Request $request)
    {
        // $lang = [
        //     'name.required' => 'Vui lòng nhập Tên thành viên !',
        //     'name.min' => 'Vui lòng nhập Tối thiểu :min ký tự !',
        //     'name.max' => 'Vui lòng nhập Tối đa :max ký tự !',
        //     'email.required' => 'Vui lòng nhập Email thành viên !',
        //     'password.required' => 'Vui lòng nhập Mật khẩu đăng nhập !',
        //     'password_confirmation.required' => 'Vui lòng nhập lại Mật khẩu đăng nhập !',
        //     'required_with' => 'Mật khẩu xác nhận là Bắt buộc nhập khi đã nhập Mật khẩu !',
        //     'password.confirmed' => 'Mật khẩu Xác nhận chưa đúng !',
        //     'password.required_with' => 'Mật khẩu Xác nhận không khớp !',
        //     'email.unique' => 'Email thành viên đã tồn tại !',
        //     'img.image' => 'Vui lòng chọn file là hình ảnh !',
        //     'img.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
        //     'img.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
        // ];
        // $request->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed|min:12',
        //     'password_confirmation' => 'sometimes|required_with:password',
        //     'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',
        // ], $lang);

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
        } else {
            $name_save = 'placeholder.png';
        }
        $data = [
            'stt' => $request->stt,
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'created_by' => Auth::id(),
            'content' => $request->content,
            'password' => $request->password,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'img' => $name_save
        ];
        $user = User::create($data);
        alert()->success("Thành công",'Đã thêm quản trị viên');
        return redirect()->route('backend.user.index');
    }
    public function updateinfo(Request $request)
    {
        $user =   User::find(auth()->user()->id);
        $lang = [
            'name.required' => 'Vui lòng nhập Tên thành viên !',
            'name.min' => 'Vui lòng nhập Tối thiểu :min ký tự !',
            'name.max' => 'Vui lòng nhập Tối đa :max ký tự !',
            'email.required' => 'Vui lòng nhập Email thành viên !',
            'email.unique' => 'Email thành viên đã tồn tại !',
            'img.image' => 'Vui lòng chọn file là hình ảnh !',
            'img.mimes' => 'Định dạng hình ảnh cho phép .jpeg, .png, .jpg, .gif, .svg !',
            'img.max' => 'Dung lượng hình ảnh tải lên tối đa là 20MB !',
        ];
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000',

        ], $lang);
        if (!$request->hasFile('img')) {
            $name_save = $user->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads', $name_save);
            $image_path_del = public_path().'/storage/uploads/'.$user->img;
            if (file_exists($image_path_del) && $user->img != 'placeholder.png') {
                unlink($image_path_del);
            }
        }
        $user->stt     = $request->stt;
        $user->name    = $request->name;
        $user->content = $request->content;
        $user->email   = $request->email;
        $user->status  = $request->status;
        $user->img     = $name_save;
        $user->save();
        alert()->success("Thành công",'Đã cập nhật thông tin quản trị viên');
        return redirect()->back();
    }

    public function updatepassword(Request $request)
    {
        // $user = User::find($id);
        $user =   User::find(auth()->user()->id);
        $lang = [
            'password.required' => 'Vui lòng nhập Mật khẩu đăng nhập hiện tại!',
            'new_password.required' => 'Vui lòng nhập Mật khẩu mới !',
            'required_with' => 'Mật khẩu Xác nhận là Bắt buộc nhập khi đã nhập Mật khẩu mới !',
            'different' => 'Mật khẩu mới phải khác Mật khẩu hiện tại !',
            'confirmed' => 'Mật khẩu Xác nhận lại Mật khẩu mới chưa đúng !',

        ];
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|different:password|confirmed',
            'new_password_confirmation' => 'sometimes|required_with:new_password',

        ], $lang);
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
            'password' => Hash::make($request->new_password)
            ]);
        } else {
            return redirect()->back()->with('success','Mật khẩu cũ bạn nhập chưa chính xác !');
        }
            $user->password = Hash::make($request->new_password);
            $user->save();
        if ($user->save()) {
            Auth::logout();
            return redirect()->route('login');
            alert()->success('Thành công','Đổi mật khẩu mới thành công ! Vui lòng đăng nhập lại !');
        }else{
            return redirect()->back();
            alert()->error('Lỗi','Cập nhật Mật khẩu mới thất bại !');
            // Auth::login($user);
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $image_path_del = public_path().'/storage/uploads/'.$user->img;
            if (file_exists($image_path_del) && $user->img != 'placeholder.png') {
                unlink($image_path_del);
            }
            $user->delete();
            return redirect()->route('backend.user.index')->with('success','Xóa Thành viên thành công !');
        }
            return redirect()->route('backend.user.index')->with('success','Xoá Thành viên thất bại !');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = User::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image) {
                $image_path_del = public_path().'/storage/uploads/'.$image->img;
                if (file_exists($image_path_del) && $image->img != 'placeholder.png') {
                    unlink($image_path_del);
                }
            }
        }
        User::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xoá thành công các Thành viên đã chọn !"]);
    }
    public function status(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'User status change successfully.']);
    }
    // public function changeStt(Request $request){
    //     $user = User::find($request->user_id);
    //     $user->stt = $request->stt;
    //     $user->save();
    //     return response()->json(['success'=>'User STT change successfully.']);
    // }
}
