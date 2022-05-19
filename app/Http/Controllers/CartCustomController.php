<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use CartHelper;
use Product;
use Setting;
use App\Models\Coupon;
use Session,DB;
use Carbon;
class CartCustomController extends ShareController
{
	// public function __construct(){
	// 	$this->middleware('account');
	// }
    public function check_coupon(Request $request){
        $data = $request->all();


        if (Coupon::where('coupon',$request->coupon)->count() <= 0) {
            return redirect()->back()->with('error','Mã giảm giá 0 dung !');
        } elseif (Coupon::where('coupon',$request->coupon)->whereDate('expiry_date','>=',Carbon::now())->whereDate('effective_date','<=',Carbon::now())->count() <= 0) {
            return redirect()->back()->with('error','Mã giảm giá nay het han !');
        } elseif (Coupon::where([['coupon',$request->coupon],['quantity','>',0]])->count() <= 0) {
            return redirect()->back()->with('error','Ma giam gia nay da het');
        } elseif (Coupon::where([['coupon',$request->coupon],['status',1]])->count() <= 0) {
            return redirect()->back()->with('error','Ma giam gia nay da het');
        } else {
            $coupon = Coupon::where([
                ['coupon',$request->coupon],
                ['status',1],
                ['quantity','>',0]
            ])
            ->whereDate('expiry_date','>=',Carbon::now())
            ->whereDate('effective_date','<=',Carbon::now())
            ->first();
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_secssion = Session::get('coupon');
                if ($coupon_secssion == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon' => $coupon->coupon,
                            'condition' => $coupon->condition,
                            'discount' => $coupon->discount,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon' => $coupon->coupon,
                        'condition' => $coupon->condition,
                        'discount' => $coupon->discount,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                Coupon::where('coupon',$request->coupon)->update(['quantity' => DB::raw('quantity - 1')]);
                return redirect()->back()->with('success','Thêm mã giảm giá thành công !');
            }
        }

    }
    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            Coupon::where('coupon',$coupon)->update(['quantity' => DB::raw('quantity + 1')]);
            return redirect()->back()->with('error','Xóa mã thành công !');
        }
    }
	public function view(){
        $setting = Setting::get()->first();
        $master = [
                    'title' => "Giỏ hàng",
                    'keywords' => "Giỏ hàng",
                    'description' => "Giỏ hàng",
                    'img' => $setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->created_at,
                    'updated_at' => $setting->updated_at
                    ];
		return view('frontend.checkout.show_order',compact('setting','master'));
	}
    public function add(CartHelper $cart, $id){
    	// echo $id;
    	$product = Product::with('translations')->find($id);
    	$cart->add($product);
    	// dd(session('cart')); //kiểm tra session
        toast('Đã thêm vào yêu thích !','success','top-right');
    	return redirect()->back();
    }
    public function add_now(CartHelper $cart, $id){
        // echo $id;
        $product = Product::with('translations')->find($id);
        $cart->add($product);
        // dd(session('cart')); //kiểm tra session
        return redirect()->route('order.view');
    }
    public function add_now_quantity (Request $request,CartHelper $cart) {
        // dd($request->product);
        // echo $id;
        if ($request->buy_now) {
            $product = Product::with('translations')->find($request->product);
            $cart->add($product,$request->qty);
            // dd(session('cart')); //kiểm tra session
            return redirect()->route('order.view');
        } else {
            $product = Product::with('translations')->find($request->product);
            $cart->add($product,$request->qty);
            // dd(session('cart')); //kiểm tra session
            return redirect()->route('order.view');
        }
    }
    // public function add_to_cart_quantity (CartHelper $cart, $id) {
    //     // echo $id;
    //     $product = Product::find($id);
    //     $cart->add($product);
    //     return redirect()->back();
    // }
    public function remove(CartHelper $cart, $id){
    	$cart->remove($id);
    	return redirect()->back();
    }
    public function update(CartHelper $cart, $id){
    	$quantity = request()->quantity ? request()->quantity : 1;
    	$cart->update($id,$quantity);
    	return redirect()->back();
    }
    public function clear(CartHelper $cart){
    	$cart->clear();
        Session::forget('coupon');
    	return redirect()->route('frontend.home.index');
    }

    public function update_cart (Request $request,CartHelper $cart) {
        //{quantity: quantity,position_row:position_row,id:id}
        $quantity_product = $request->quantity;
        $position_row = $request->position_row;
        $id = $request->id;

        $product = Product::with('translations')->where('id',$id)->first();
        $subtotal = $quantity_product * $product->selling_price;
        $cart->update($id,$quantity_product);
        $cart_total = 0;
        //dd($cart);
        foreach ($cart->items as $item) {
            $subtotalCart = $item["sale_price"] * $item["quantity"];
            $cart_total += $subtotalCart;
        }

        return response()->json([
            'quantity' => $cart,
            'subtotal' => number_format($subtotal)."d",
            'total' => number_format($cart_total)
        ]);

    }
}
