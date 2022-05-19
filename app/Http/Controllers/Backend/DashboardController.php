<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Illuminate\Http\Request;
use DB;
use App\Models\Counter;
use Carbon\Carbon;
use Session;
class DashboardController extends ShareController
{
    public function index()
    {   if(session('locale') == null)
      Session::put('locale', 'vi');
               $month_of_year =  Carbon::now()->month;
        $year =  Carbon::now()->year;
        if ($month_of_year < 10) {
            $get_month = Carbon::now()->month;
            $month = '0'.$get_month;
        }else {
            $month =  Carbon::now()->month;
        }
        return view('backend.dashboard.index',compact('month','year'));



    }
        public function counter(){
            $month =  Carbon::now()->month;
            $year =  Carbon::now()->year;
            $get_all_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
            ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
            ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
            ->get()
            ->groupBy('days');
            $count_day_duplicate = [];
            $count_day = [];
            foreach ($get_all_colum_counter as $key => $value) {
                $count_day_duplicate[(int)$key] = count($value);
            }
            for($i = 1; $i <= Carbon::now()->daysInMonth; $i++){
                if(!empty($count_day_duplicate[$i])){
                    $count_day[$i] = $count_day_duplicate[$i];
                }else{
                    $count_day[$i] = 0;
                }
                $respon[] = array($i, $count_day[$i]);
            }
            return response()->json($respon);
        }

        public function shortday(Request $resquest){
            $month = $resquest->get('getmonth');
            $year = $resquest->get('getyear');
            $timeget = "$year-$month";
            $get_short_colum_counter =  Counter::select('id','time', DB::raw("DATE_FORMAT(time, '%d') days"))
            ->where(DB::raw("DATE_FORMAT(time, '%Y')"),'=',$year)
            ->where(DB::raw("DATE_FORMAT(time, '%m')"),'=',$month)
            ->get()
            ->groupBy('days');
            $short_count_day_duplicate = [];
            $short_count_day = [];
            foreach ($get_short_colum_counter as $keyz => $valueshort) {
                $short_count_day_duplicate[(int)$keyz] = count($valueshort);
            }
            for($i = 1; $i <= Carbon::create($year,$month,1)->daysInMonth; $i++){
                if(!empty($short_count_day_duplicate[$i])){
                    $short_count_day[$i] = $short_count_day_duplicate[$i];
                }else{
                    $short_count_day[$i] = 0;
                }
                $response[] = array($i, $short_count_day[$i]);
            }
            return response()->json($response);
        }
}
