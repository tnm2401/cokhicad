<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Translation;
use Illuminate\Database\Eloquent\Model;

class CouponController extends ShareController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::with('translations')->get();
        return view('backend.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lang = [
            'coupon.required' => 'Vui lòng nhập mã Coupon !',
            'coupon.unique'   => 'Mã Coupon đã tồn tại !',
            'discount.required' => 'Vui lòng nhập giá trị !',
            'quantity.required' => 'Vui lòng nhập số lần sử dụng !',
            'effective_date.required' => 'Vui lòng chọn ngày bắt đầu !',
            'expiry_date.required' => 'Vui lòng chọn ngày kết thúc !',
        ];
        $request->validate([
            'coupon'  => 'required|max:20|unique:coupons',
            'discount' => 'required',
            'quantity' => 'required',
            'effective_date' => 'required|date',
            'expiry_date' => 'required|date',
        ], $lang);
        $data = [
            'stt' => $request->stt,
            'condition' => $request->condition,
            'coupon' => $request->coupon,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'effective_date' => $request->effective_date,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
        ];
        $coupon = Coupon::create($data);
        $coupon->translations()->createMany($request->translation);


        if ($coupon) {
            alert()->success("Thành công",'Đã thêm counpon');
            return redirect()->route('coupon.index');
        }
            alert()->error("Thất bại",'Đã có lỗi xảy ra');
            return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $coupon = Coupon::with('translations')->find($id);
        return view('backend.coupons.edit',compact('coupon'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        $coupon->stt             = $request->stt;
        $coupon->status     = $request->status;
        $coupon->coupon	 =$request->coupon;
        $coupon->condition	 =$request->condition;
        $coupon->quantity	 =$request->quantity;
        $coupon->discount	 =$request->discount;
        $coupon->expiry_date	 =$request->expiry_date;
        $coupon->effective_date		 =$request->effective_date	;


        $coupon->translations()->update($request->translation);
        $coupon->save();
        alert()->success("Thành công","Đã cập nhật mã giảm giá");
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
            if ($coupon) {
                $coupon->delete();
                $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Coupon')->delete();
                Coupon::whereIn('id',explode(",",$ids))->delete();
                alert()->success("Thành công",'Đã xóa Coupon');
                return redirect()->route('coupon.index');
            }
                alert()->error("Thất bại",'Đã có lỗi xảy ra !');
                return redirect()->route('coupon.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $coupon = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Coupon')->delete();
        Coupon::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các Coupon đã chọn !']);
    }

    public function hideShow(Request $request){
        $coupon = Coupon::find($request->coupon_id);
        $coupon->status = $request->hide_show;
        $coupon->save();
        return response()->json(['success'=>'Coupon Hide Show change successfully.']);
    }

    public function changeStt(Request $request){
        $coupon = Coupon::find($request->coupon_id);
        $coupon->stt = $request->stt;
        $coupon->save();
        return response()->json(['success'=>'coupon STT change successfully.']);
    }
}
