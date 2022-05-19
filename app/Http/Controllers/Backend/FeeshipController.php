<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use Province;
use District;
use Ward;
use App\Models\Feeship;

class FeeshipController extends ShareController
{
    public function index(){
        $feeships = Feeship::get();
        $provinces = Province::orderBy('id','ASC')->get();

    	return view('backend.feeships.index',compact('feeships','provinces'));
    }

    public function create(Request $request){
    	$provinces = Province::orderBy('id','ASC')->get();
    	return view('backend.feeships.create',compact('provinces'));
    }
    public function select(Request $request){
    	$data = $request->all();
    	if ($data['action']) {
    		$output = '';
    		if ($data['action'] == 'province') {
    			$select_district = District::where('province_id',$data['code_id'])->orderBy('id','ASC')->get();
    			$output.='<option value="">Chọn Quận/Huyện</option>';
    			foreach ($select_district as $key => $district){
    				$output.='<option value="'.$district->id.'">'.$district->name.'</option>';
    			}
    		}elseif ($data['action'] == '2province') {
    			$select_district1 = District::where('province_id',$data['code_id'])->orderBy('id','ASC')->get();
    			$output.='<option value="">Chọn Quận/Huyện</option>';
    			foreach ($select_district1 as $key => $district){
    				$output.='<option value="'.$district->id.'">'.$district->name.'</option>';
    			}
    		}else{
    			$select_ward = Ward::where('district_id',$data['code_id'])->orderBy('id','ASC')->get();
    			$output.='<option value="">Chọn Xã/Phường</option>';
    			foreach ($select_ward as $key => $ward){
    				$output.='<option value="'.$ward->id.'">'.$ward->name.'</option>';
    			}
    		}
    	}
    	echo $output;
    }
    public function store(Request $request){
        $validate = [
            'province.required' => 'Vui lòng chọn Tỉnh/TP !',
            'district.required' => 'Vui lòng chọn Quận/Huyện !',
            'ward.required' => 'Vui lòng chọn Phường/Xã !',
            'fee_ship.required' => 'Vui lòng nhập phí vận chuyển !'
        ];
        $request->validate([
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'fee_ship' => 'required'
        ], $validate);
        $data = [
            'province_id' => $request->province,
            'district_id' => $request->district,
            'ward_id' => $request->ward,
            'fee_ship' => $request->fee_ship,
        ];
    	$fee_ship = Feeship::create($data);
        alert()->success("Thành công",'Đã thêm phí ship')->autoClose(2000);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validate = [
            'province.required' => 'Vui lòng chọn Tỉnh/TP !',
            'district.required' => 'Vui lòng chọn Quận/Huyện !',
            'ward.required' => 'Vui lòng chọn Phường/Xã !',
            'fee_ship.required' => 'Vui lòng nhập phí vận chuyển !'
        ];
        $request->validate([
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'fee_ship' => 'required'
        ], $validate);
        $fee_ship = Feeship::find($id);
        $fee_ship->province_id = $request->province;
        $fee_ship->district_id = $request->district;
        $fee_ship->ward_id = $request->ward;
        $fee_ship->fee_ship = $request->fee_ship;
        $fee_ship->save();
        alert()->success("Thành công","Đã cập nhật lại phí ship");
        return redirect()->back();
    }

    public function data(){
        $feeships = Feeship::orderBy('id','DESC')->get();
        $output = '';
        $output .='<div class="table-responsive">
            <table class="table table-bordered">
            <thread>
                <tr>
                    <th>Tỉnh/Thành phố</th>
                    <th>Quận/Huyện</th>
                    <th>Phường/Xã</th>
                    <th>Phí Ship</th>
                </tr>
            </thread>
            <tbody>
            ';
            foreach ($feeships as $key => $feeship) {
            $output .='
                <tr>
                    <td>'.$feeship->Province->name.'</td>
                    <td>'.$feeship->District->name.'</td>
                    <td>'.$feeship->Ward->name.'</td>
                    <td contenteditable data-feeship_id="'.$feeship->id.'" class="ship_edit">'.number_format($feeship->fee_ship,0,',',',').'</td>
                </tr>';
            }
            $output.='
            </tbody>
            </table></div>';
            echo $output;
    }



    public function update_ship(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['ship_id']);
        $fee_value = rtrim($data['ship_value'],',');
        $fee_ship->fee_ship = $fee_value;
        $fee_ship->save();
    }
    public function destroy(Feeship $feeship)
    {
            if ($feeship) {
                $feeship->delete();
                alert()->success("Thành công",'Đã xóa phí ship');
                return redirect()->route('feeship.index');
            }
                alert()->error("Thất bại",'Đã có lỗi xảy ra');
                return redirect()->route('feeship.index');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        Feeship::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
}
