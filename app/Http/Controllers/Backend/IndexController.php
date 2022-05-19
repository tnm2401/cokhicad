<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use App\Models\About;
use Validate;
use Artisan;
use Config;
use Hash;
use Size_crop;
use Translation;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class IndexController extends ShareController
{
    public function clear(Request $request)
    {
        Artisan::call('clear-compiled');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('config:cache');
        Artisan::call('view:cache');
        alert()->success("Thành công !",'Đã xóa hết Cache !');
        return redirect()->back();
    }
    public function down_web(Request $request)
{
    $pass=$request->pass;
    $slug = Str::slug($pass);
    Artisan::call("down --secret=$slug");
    $maintain = Setting::firstorfail();
    $maintain->maintain = 1;
    $maintain->maintainpass = Hash::make($slug);
    $maintain->save();
    // Config::set('app.debug', true);
    alert()->warning('Cảnh báo','Đã đưa trang web vào trạng thái bảo trì !');
    return redirect("/$slug")->with('maintain','đã bảo trì');


}
public function up_web(Request $request)
{
    $maintain = Setting::firstorfail();
    if( Hash::check($request->pass  , $maintain->maintainpass)){
        $maintain->maintain = 0;
        $maintain->save();
        Artisan::call('up');
        alert()->success('Thành công','Website đã hoạt động lại !');
        // Config::set('app.debug', false);
    }
    else{
        alert()->error('Thất bại','Mật khẩu chưa chính xác !');
    }
    return redirect()->route('backend.dashboard.index');
}
public function filemanager(){
    return view('backend.filemanager.index');
}

public function changelocale($locale){
    session()->put('locale', $locale);
    return redirect()->back();
}

public function reset_pass_maintain(Request $request){
    $pass = $request->pass;
    $slug = Str::slug($pass);
    Artisan::call('up');
    Artisan::call("down --secret=$slug");
    $maintain = Setting::firstorfail();
    $maintain->maintainpass = Hash::make($slug);
    $maintain->save();
    alert()->success("Thành công",'Đã đổi mật khẩu bảo trì web !');
    return redirect()->back();
}


public function crop_size($size=NULL,$width =NULL, $height=NULL){
    $size = Size_crop::whereType($size)->first();
    // dd($size[$type]);
    return $a = ["$size->width", "$size->height"];
}

public function delete_demo_data(Request $request){
    $data = Translation::where('trans_type','!=','App\Models\Setting')->get();
    foreach($data as $d){
        $d->delete();
    }
    alert()->success('Thành công','Đã xóa dữ liệu demo');
    return redirect()->route('backend.dashboard.index');
}

}
// {{ imageUrl('/storage/uploads/'.$post->img,'440','297','100','1') }}

