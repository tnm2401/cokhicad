<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\ShareController;
use Order;
use Province;
use District;
use Ward;
use Validate;
use App\Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class LocationController extends ShareController
{
    public function getDistrictList(Request $request){
        $districts = District::where("province_id",$request->province_id)
        ->pluck("name","id");
        return response()->json($districts);
    }
    public function getWardList(Request $request){
        $wards = Ward::where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($wards);

    }
}
