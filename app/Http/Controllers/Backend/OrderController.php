<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Order;
use Orderdetail;
use Province;
use District;
use Ward;
use Validate;
use Status_order;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class OrderController extends ShareController
{
    public function getDistrictList(Request $request){
        $districts = District::where("province_id",$request->province_id)->pluck("name","id");
        return response()->json($districts);
    }
    public function getWardList(Request $request){
        $wards = Ward::where("district_id",$request->district_id)->pluck("name","id");
        return response()->json($wards);
    }
    public function index(){
        $orders = Order::orderBy('stt', 'asc')->orderby('id','desc')->get();
        $data['status_order'] = Status_order::orderBy('id','asc')->get();
        return view('backend.orders.index', compact('orders','data'));
    }
    public function create(){
        $orders = Order::all();
        return view('frontend.orders.index', compact('orders'));
    }
    public function edit(Request $request, $id){
        $order = Order::with('orderdetail')->find($id);
        $jsonorder = $order->cart;
        $decodes = json_decode($jsonorder, true);
        $provinces = Province::get();
        $data['status_order'] = Status_order::get();
        // $ship['districts'] = District::all();
        // $ship['provinces'] = Province::all();
        // $ship['wards'] = Ward::all();
        return view('backend.orders.edit', compact('order','data','decodes','provinces'));
    }
    public function update(Request $request, $id){
        $order = Order::find($id);
        // Get name Provice
        if ($request->province == '') {
            $province = $order->province;
        } else {
            $array = $request->province;
            $explode = explode('|' ,$array);
            $province = $explode[1];
        }
        // Get name District
        if ($request->district == '') {
            $district = $order->district;
        } else {
            $array = $request->district;
            $explode = explode('|' ,$array);
            $district = $explode[1];
        }
        // Get name Ward
        if ($request->ward == '') {
            $ward = $order->ward;
        } else {
            $array = $request->ward;
            $explode = explode('|' ,$array);
            $ward = $explode[1];
        }
        $order->stt         = $request->stt;
        $order->name        = $request->name;
        $order->phone       = $request->phone;
        $order->email       = $request->email;
        $order->address     = $request->address;
        $order->province    = $province;
        $order->district    = $district;
        $order->ward        = $ward;
        $order->note        = $request->note;
        $order->status      = $request->get('status');
        // $order->name_2      = $request->name_2;
        // $order->phone_2     = $request->phone_2;
        // $order->address_2   = $request->address_2;
        // $order->province_2  = $province_2;
        // $order->district_2  = $district_2;
        // $order->ward_2      = $ward_2;
        // $order->company     = $request->company;
        // $order->tax_code    = $request->tax_code;
        // $order->address_vat = $request->address_vat;
        // $order->note_vat    = $request->note_vat;
        // $order->transport   = $request->transport;
        // $order->Order       = $request->Order;
        if($request->delete_item){
            $orderdetail = Orderdetail::find($request->delete_item);
            $price_item = $orderdetail->price*$orderdetail->quantity;
            $update_total = $order->total - $price_item;
            $order->total = $update_total;
            $order->save();
            $orderdetail->delete($id);
            alert()->success('Th??nh c??ng !','???? X??a s???n ph???m trong ????n h??ng !');
            return redirect()->back();
        }

        $order->update();
        if ($order->update()) {
            alert()->success('Th??nh c??ng !','C???p nh???t ????n h??ng th??nh c??ng !');
            return redirect()->route('backend.order.index');
        }
            alert()->error("Th???t b???i !",'C???p nh???t ????n h??ng b??? l???i !');
            return redirect()->route('backend.order.index');
    }
    public function destroy(Request $request, $id){
        $order = Order::find($id);
        if ($order){
            $order->delete();
            alert()->success('Th??nh c??ng !','X??a ????n h??ng th??nh c??ng !');
            return redirect()->route('backend.order.index');
        }
            alert()->error('Th???t b???i !','X??a ????n h??ng l???i !');
            return redirect()->route('backend.order.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        Order::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xo?? th??nh c??ng c??c m???c ???? ch???n !']);
    }
    public function changeStt(Request $request){
        $order = Order::find($request->order_id);
        $order->stt = $request->stt;
        $order->save();
        return response()->json(['success'=>'Order STT change successfully.']);
    }
    public function postSearchTable(Request $request){
        $lang = [
            'fromday.required' => 'Vui l??ng ch???n ng??y b???t ?????u !',
            'today.required' => 'Vui l??ng ch???n ng??y k???t th??c !',
            'status.required' => 'Vui l??ng ch???n t??nh tr???ng !',
            'today.after_or_equal' => 'Ng??y k???t th??c ph???i l???n h??n ho???c b???ng ng??y b???t ?????u !',
        ];
        $request->validate([
            'fromday' => 'required|date',
            'today' => 'required|date|after_or_equal:fromday',
            'status' => 'required',
        ], $lang);
        $data['status_order'] = Status_order::orderBy('id','asc')->get();
        $from = Carbon::parse($request->fromday)->startOfDay(); //2016-09-29 00:00:00.000000
        $to = Carbon::parse($request->today)->endOfDay(); //2016-09-29 23:59:59.000000
        $status = $request->status;
        if($status == 0){
            $orders = Order::whereBetween('created_at',[$from,$to])->get();
        } else {
            $orders = Order::whereBetween('created_at', [$from, $to])->where('status',$status)->get();
        }
        // $returnHTML = view('backend.orders.ajax-search')->with('orders', $orders)->render();
        return view('backend.orders.ajax-search', compact('orders','from','to','status','data'));
    }
}
