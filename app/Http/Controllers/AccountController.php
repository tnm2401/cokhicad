<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use Auth;
use Account;
use Setting;
use Carbon;
use App\Models\Modelsaccountforgetpassword;
use Str,DateTime;

class AccountController extends ShareController
{
    // public function __construct()
    // {
    //    $this->middleware('verified');
    // }
    // public function __construct(){
    //     parent::__construct();
    // }
    public function logout(){
        Auth::guard('account')->logout();
        return redirect()->route('frontend.home.index');
    }
    public function registeraccount(){
        $setting = Setting::get()->first();
        $master = [
                    'title' => "Đăng ký tài khoản",
                    'keywords' => "Đăng ký tài khoản",
                    'description' => "Đăng ký tài khoản",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
        return view('frontend.accounts.register',compact('master'));
    }

    public function postregisteraccount(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required|email|unique:accounts',
    		'phone' => 'required|unique:accounts',
    		'address' => 'required',
    		'password' => 'required',
    		'confirm_password' => 'required|same:password',
    	],[
    		'name.required' => 'Vui lòng nhập tên tài khoản',
    		'confirm_password.same' => 'Mật khẩu nhập lại không chính xác'
    	]);
    	$request->merge(['password' => bcrypt($request->password)]); //ghi đè password

        $data = $request->all();
        $data['token'] = Str::random(40);
        $data['email_verified_at'] = Carbon::now()->addMinutes(15);
        $account = Account::create($data);
        // $account->sendVerificationEmail();



    	if ($data) {
    		return redirect()->route('frontend.home.login')->with('success','Đăng ký tài khoản thành công !');
    	}
    		return redirect()->back()->with('error','Đăng ký tài khoản thất bại !');
        // dd($request->all());
    }

    public function homelogin(){
        $setting = Setting::get()->first();
        $master = [
                    'title' => "Đăng nhập tài khoản",
                    'keywords' => "Đăng nhập tài khoản",
                    'description' => "Đăng nhập tài khoản",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
        return view('frontend.accounts.login',compact('master'));


    }
    public function auth_verify($token){
        // dd($token);
        $user_check = Account::where('token', $token)->where('email_verified_at', '>=', Carbon::now())->exists();

        if ($user_check) {
            Account::where('token', $token)->firstOrFail()->update(
                [
                    'token'  => null,
                    'status' => 1
                ]
            );
            return redirect()->route('frontend.home.login');
        } else {
            Account::where('token', $token)->forceDelete();

            return redirect()->route('frontend.home.registeraccount');
        }
    }

    public function profile(){
        return view('frontend.accounts.profile');
    }

    public function changepassword(){
        return view('frontend.accounts.changepassword');
    }

    public function orderlist(){
        return view('frontend.accounts.orderlist');
    }

    public function posthomelogin(Request $request){
        // dd($request->all());
       $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        // $login = Auth::guard('account')->attempt($request->only('email','password'),$request->has('remember'));

        $login = array(
            'email'    => $request->email,
            'password' => $request->password,
            // 'status'   => 1
        );

        $remember = $request->remember ? true : false;
        if (Auth::guard('account')->attempt($login,$remember)) {
            toast('Đăng nhập thành công !','success','top-right');
                return redirect()->back();
            }else{
                toast('Đăng nhập thất bại !','error','top-right');
                return redirect()->back();
            }
    }

    public function forget_password (Request $request) {
        $setting = Setting::get()->first();
        $master = [
                    'title' => "Quên mật khẩu",
                    'keywords' => "Quên mật khẩu",
                    'description' => "Quên mật khẩu",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
        return view('frontend.accounts.forget_password',compact('master'));
    }

    public function post_forget_password (Request $request) {

        $account = Account::where('email', $request->email)->first();

        if (empty($account)) {
            return redirect()->route('frontend.home.registeraccount');
        }

        $passwordReset = Modelsaccountforgetpassword::updateOrCreate([
            'email' => $account->email,
        ], [
            'token' => Str::random(60),
            // 'created_at' => new DateTime()
        ]);

        $account->sendForgotPasswordEmail($passwordReset->token);

        return redirect()->route('auth.forget_password');

    }

    public function change_password ($token) {
        $setting = Setting::get()->first();
        $master = [
                    'title' => "Lấy lại mật khẩu mới",
                    'keywords' => "Lấy lại mật khẩu mới",
                    'description' => "Lấy lại mật khẩu mới",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
        $passwordReset = Modelsaccountforgetpassword::where('token', $token)->firstOrFail();

        if (Carbon::parse($passwordReset->created_at)->addMinutes(15)->isPast()) {

            $passwordReset->delete();

            return redirect()->route('auth.forget_password');
        } else {
            return view('frontend.accounts.new_password',compact('master'),['token' => $token]);
        }
    }
    public function post_change_password (Request $request,$token) {
        $lang = [
        'password.required'     => 'Vui lòng nhập Mật khẩu đăng nhập !',
        'password_confirmation.required'     => 'Vui lòng nhập lại Mật khẩu đăng nhập !',
        'required_with' => 'Mật khẩu xác nhận là Bắt buộc nhập khi đã nhập Mật khẩu !',
        'password.confirmed'     => 'Mật khẩu Xác nhận chưa đúng !',
        'password.required_with'     => 'Mật khẩu Xác nhận không khớp !',
    ];
        $request->validate([
        'password' => 'required|confirmed|min:6',
        'password_confirmation'=>'sometimes|required_with:password',
    ], $lang);
        $passwordReset = Modelsaccountforgetpassword::where('token', $token)->firstOrFail();
        $user = Account::where('email', $passwordReset->email)->firstOrFail();

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(15)->isPast()) {
            $passwordReset->delete();
            return redirect()->route('auth.forget_password');
        } else {
            $data['password'] = bcrypt($request->password);
            $user->update($data);
            $passwordReset->delete();
            return redirect()->route('frontend.home.login');
        }
    }
}
