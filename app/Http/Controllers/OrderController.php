<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use CartHelper;
use Product;
use Setting;
use Order;
use Orderdetail;
use Auth;
use Mail;
use Province;
use District;
use Ward;
use Session;
use App\Models\Feeship;

class OrderController extends ShareController
{
	// public function __construct(){
 //        parent::__construct();
	// 	$this->middleware('account');
	// }
    public function delete_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if ($data['province_id']) {
            $feeship = Feeship::where('province_id',$data['province_id'])
            ->where('district_id',$data['district_id'])
            ->where('ward_id',$data['ward_id'])
            ->first();
            if ($feeship) {
                Session::put('fee',$feeship->fee_ship);
                Session::save();
            } else {
                Session::put('fee',10);
                Session::save();
            }

        }
    }
    public function selecthome(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'province') {
                $select_district = District::where('province_id',$data['code_id'])->orderBy('id','ASC')->get();
                $output.='<option>Chọn Quận/Huyện</option>';
                foreach ($select_district as $key => $district){
                    $output.='<option value="'.$district->id.'|'.$district->name.'">'.$district->name.'</option>';
                }
            }else{
                $select_ward = Ward::where('district_id',$data['code_id'])->orderBy('id','ASC')->get();
                $output.='<option>Chọn Xã/Phường</option>';
                foreach ($select_ward as $key => $ward){
                    $output.='<option value="'.$ward->id.'|'.$ward->name.'">'.$ward->name.'</option>';
                }
            }
        }
        echo $output;
    }
	public function form(){
        $setting = Setting::get()->first();
        // $provinces = Province::get();
        $provinces = Province::orderBy('id','desc')->get();
        // dd($provinces);
        $master = [
                    'title' => "Thanh toán",
                    'keywords' => "Thanh toán",
                    'description' => "Thanh toán",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
		return view('frontend.checkout.checkout',compact('setting','master','provinces'));
	}
    public function getDistrictList(Request $request)
            {
                $districts = District::where("province_id",$request->province_id)
                ->pluck("name","id");
                return response()->json($districts);
            }

    public function getWardList(Request $request)
            {
                $wards = Ward::where("district_id",$request->district_id)
                ->pluck("name","id");
                return response()->json($wards);
            }
    public function success(){
        return view('frontend.checkout.success');
    }
    public function submit_form(Request $request, CartHelper $cart){
        // valide dữ liệu nhập vào
            // code ở đây ?
        // end validate dữ liệu nhập vào
        // $account_id = Auth::guard('account')->user()->id;
        // $account_email = Auth::guard('account')->user()->email;
        // $account_name = Auth::guard('account')->user()->name;
        // $order_note = $request->note;
        if ($request->province) {
           // Get name Provice
           $arrayProvince = $request->province;
           $explodeProvince = explode('|' ,$arrayProvince);
           $province = $explodeProvince[1];
        }
        if ($request->district) {
           // Get name District
            $arrayDistrict = $request->district;
            $explodeDistrict = explode('|' ,$arrayDistrict);
            $district = $explodeDistrict[1];    
        }
        if ($request->ward) {
           // Get name Ward
            $arrayWard = $request->ward;
            $explodeWard = explode('|' ,$arrayWard);
            $ward = $explodeWard[1];
        }
        $order = new Order();
        $order->order_note = $request->order_note ?? '';
        $order->stt = true;
        $order->name = $request->name ?? '';
        $order->email = $request->email ?? '';
        $order->phone = $request->phone ?? '';
        $order->note = $request->note ?? '';
        $order->address = $request->address ?? '';
        $order->province = $province ?? '';
        $order->district = $district ?? '';
        $order->ward = $ward ?? '';
        $order->total = $request->total ?? false;
        $order->status = true;
        $order->save();
        $order->order_id = 'AIB'.$order->id.'-'.date('dmy');
        $order->save();
        if ($order -> save()){
           // 'account_id' => $account_id ?? '',
           // 'order_id' => 'AIB'.$this->id.'-'.date('dmy'),
           // 'order_note' => $request->order_note,
           // 'name' =>$request->name,
           // 'email'=>$request->email,
           // 'phone'=>$request->phone,
           // 'note' => $request->note,
           // 'address' => $request->address,
           // 'province' =>$request->province,
           // 'district'=>$request->district,
           // 'ward' => $request->ward,
           // 'total' => $request->total,
           // 'status'=> true,
           $orderId = $order->id;
           foreach ($cart->items as $product_id => $item) {
               $quantity = $item['quantity'];
               $price = $item['sale_price'];
               Orderdetail::create([
                   'order_id' => $orderId,
                   'product_id' => $product_id,
                   'price' => $price,
                   'quantity' => $quantity
               ]);
           }
           $setting = Setting::get()->first();
           $web = $setting->website;
           // $email_admin = $setting->email;
           // // Sent email from Order to Email Admin
           // Mail::send('frontend.email.success',[
           //     'account_name' => $account_name,
           //     'order' => $order,
           //     'order_id' => $order->id,
           //     // 'order_date' => $order->order_date,
           //     'items' => $cart->items,
           //     'web' => $setting->website
           // ], function($mail) use($request, $web, $account_email, $account_name, $email_admin){
           //     $mail->to($account_email,$account_name);
           //     $mail->cc($email_admin);
           //     // $mail->from($request->email);
           //     $mail->subject('Đơn đặt hàng mới từ website: '.$web);
           // });
           session(['cart' => '']);
           alert()->success("Thành công !",'Kiểm tra thông tin đơn hàng qua mail !');
           return redirect()->route('frontend.checkout.success');
        } else {
            alert()->error("Lỗi","Đặt hàng thất bại");
            return redirect()->back();
        }
    }
}
