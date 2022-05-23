<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Setting;
use Video;
use Servi;
use Recruitment;
use Newcategory;
use Svcategory;
use Post;
use Contact;
use Contactform;
use Author;
use Slider;
use Footer;
use View;
use User;
use Session;
use App;
use Procatone;
use Language;
use Size_crop;
use Page;
use Newcatone;
use Videocat;
use Gallery;
class ShareController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $setting = Setting::first();
        $language = Language::get();
        $lang = session()->get('locale') ?? 'vi';
        $master =
                [
                    'name' => $setting->{ 'nameindex_'.$lang },
                    'title' => $setting->{ 'title_'.$lang },
                    'keywords' => $setting->{ 'keywords_'.$lang },
                    'description' => $setting->{ 'description_'.$lang },
                    'img' => 'setting/'.$setting->img,
                    'type' => $setting->type,
                    'created_at' => $setting->published,
                    'updated_at' => $setting->updated_at
                ];
        // // cropssize hình
        // $size['backend_thumb'] = Size_crop::whereType('backend_thumb')->first();




        View::share('setting',$setting);
        View::share('language',$language);
        View::share('master',$master);
        View::share('lang',$lang);
        // View::share('size',$size);


        $isactive = '';
        $typeproduct2 = '';
        View::share('isactive',$isactive);
        View::share('typeproduct2',$typeproduct2);


        $menu['gioi-thieu'] = Page::where('id',8)->first();
        $menu['lien-he'] = Page::where('id',14)->first();
        $menu['san-pham'] = Procatone::orderBy('stt','asc')->orderBy('id','desc')->where('hide_show','1')->get();
        $menu['tin-tuc'] = Newcatone::orderBy('stt','asc')->orderBy('id','desc')->where('hide_show','1')->get();
        $menu['tin-tuyen-dung'] = Page::where('id',19)->first();
        $menu['tat-ca-san-pham'] = Page::where('id',15)->first();
        $menu['tat-ca-bai-viet'] = Page::where('id',16)->first();
        $menu['tat-ca-dich-vu'] = Page::where('id',18)->first();
        $menu['dich-vu'] = Svcategory::orderBy('stt','asc')->orderBy('id','desc')->where('hide_show','1')->get();
        $menu['hoat-dong']['media'] = Videocat::where('hide_show','1')->orderby('stt','asc')->orderby('id','desc')->get();
        $menu['hoat-dong']['gallery'] = Gallery::where('hide_show','1')->orderby('stt','asc')->orderby('id','desc')->get();

        $menu['footer'] = Page::where('id',17)->first();

        View::share('menu',$menu);

    }



}
