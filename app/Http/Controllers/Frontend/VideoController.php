<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\ShareController;
    use Illuminate\Http\Request;
    use App\Models\Category;
    use App\Models\Designcategory;
    use App\Models\Design;
    use App\Models\Setting;
    use View;
    use Auth;
    use Video;
    use Cache;
    use Session;
    use Carbon\Carbon;
    use Jenssegers\Agent\Agent;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\URL;

    class VideoController extends ShareController
    {
        public function videos(Request $request)
        {
            $setting = Setting::get()->first();
            $videos = Video::where('hide_show',1)->orderBy('stt','asc')->orderBy('id','desc')->get();
            $master = [
                        'title' => "Video",
                        'keywords' => "Video",
                        'description' => "Video",
                        'img' => $setting->img,
                        'type' => $setting->type,
                        'created_at' => $setting->created_at,
                        'updated_at' => $setting->updated_at
                        ];
            return view('frontend.videos.index',compact('master','videos'));
        }
    }









