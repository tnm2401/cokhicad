<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\ShareController;
    use Illuminate\Http\Request;
    use Setting;
    use Servi;
    use Recruitment;
    use Slider;
    use About;
    use Newcategory;
    use Post;
    use Contact;
    use Author;
    use Svcategory;
    use Page;
    use Counter;
    use Online;
    use View;
    use Auth;
    use Cache;
    use Session;
    use Carbon;
    use Procatone;
    use Product;
    use Partner;
    use Translation;
    use Productsimage;
    use Procattwo;
    use Newcatone;
    use Gallery;
    use Videocat;
    use Video;
    use Stepwork;
    use Jenssegers\Agent\Agent;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\Config;

    class HomeController extends ShareController
    {
        /* trang chủ */
        public function index(Request $request)
        {
            $setting = Setting::first();
            $data['slider'] = Slider::orderby('stt','asc')->orderby('id','desc')->where('hide_show',1)->get();
            $data['about-us'] = Page::where('id',8)->first();
            $data['service1'] = Page::where('id',9)->first();
            $data['service2'] = Page::where('id',10)->first();
            $data['why-us'] = Page::where('id',11)->first();
            $data['step-work'] = Page::where('id',12)->first();
            $data['step-work-box'] = Stepwork::orderby('stt','asc')->get();
            $data['partner'] = Partner::where('hide_show',1)->get();
            $data['contact'] = Page::where('id','13')->first();
            $data['featured_post'] = Post::orderby('stt','asc')->orderby('id','desc')
            ->where('hide_show',1)->where('is_featured','1')->limit(6)->get();
            $data['featured-product'] = Product::where('hide_show','1')->where('is_featured','1')->orderby('stt','asc')->orderby('id','desc')->get();
            $data['gallery'] = Productsimage::where('type','3')->where('product_id','14')->limit(20)->get();


            $time_now = Carbon::now('Asia/Ho_Chi_Minh');
            $user_online = $request->session()->getId();
            if (Online::where('session_id', '=', $user_online)->count() > 0) {
            } else {
                $online = new Online([
                    'session_id' => $user_online,
                ]);
                $online->save();
            }
            $time_db = Online::get();
            foreach ($time_db as $item) {
                $time_old = $item->created_at;
                $time_id = $item->id;
                $check_time = $time_now->diffInMinutes($time_old);
                $check_time_counter = $time_now->diffInMinutes($time_old);
                $ip_user = $_SERVER['REMOTE_ADDR'];
                if (Counter::where('time', '=', $time_old)->count() > 0) {
                } else {
                DB::table('counters')->whereDate('time', '>=', date('Y-m-d H:i:s',strtotime('-1 minutes')) )->insert(['time' => $time_old,'ip'=>$ip_user]);
                }
                if ($check_time_counter > 1) {
                    $deletedRows = Online::where('id', $time_id)->delete();
                }
            }
            return view("frontend.home.index",compact('setting','data'));
        }

        // slug
        public function slug($slug){
            $data = Translation::where('slug',$slug)->FirstOrFail();
            switch($data->trans_type){
                case('App\Models\Page');
                $page = Page::with('translations')->where('id',$data->trans_id)->First();
                $master =
                [
                    'name' => $page->translations->name,
                    'title' => $page->translations->title,
                    'keywords' => $page->translations->keywords,
                    'description' => $page->translations->description,
                    'img' => 'pages/'.$page->img,
                    'type' => $page->type,
                    'created_at' => $page->created_at,
                    'updated_at' => $page->updated_at
                ];
                if($data->slug == 'gioi-thieu'  || $data->slug == 'about-us'){
                    $isactive = 'gioi-thieu';

                    return view('frontend.site.about-us',compact('page','master','isactive'));
                }
                elseif($data->slug == 'lien-he' || $data->slug == 'contact'){
                    $isactive ='lien-he';

                    return view('frontend.site.contact',compact('page','master','isactive'));
                }
                elseif($data->slug == 'san-pham' || $data->slug == 'product'){
                    $product = Product::orderby('stt','asc')->orderby('id','desc')->where('hide_show','1')->paginate(9);
                    $isactive = 'san-pham';

                    return view('frontend.site.all-product',compact('page','product','master','isactive'));
                }
                elseif($data->slug == 'bai-viet' || $data->slug == 'post'){
                    $isactive='tin-tuc';

                    $post = Post::where('hide_show','1')->orderby('stt','asc')->orderby('id','desc')->paginate(9);
                    return view('frontend.site.all-post',compact('post','page','master','isactive'));
                }
                elseif($data->slug == 'tuyen-dung' || $data->slug == 'recruiment'){
                    $isactive='tuyen-dung';

                    $post = Recruitment::where('hide_show','1')->orderby('stt','asc')->orderby('id','desc')->paginate(9);
                    return view('frontend.site.all-recruitment',compact('post','page','master','isactive'));
                }
                elseif($data->slug == 'dich-vu' || $data->slug == 'all-services'){
                    $isactive='dich-vu';

                    $service = Servi::where('hide_show','1')->orderby('stt','asc')->orderby('id','desc')->paginate(9);
                    return view('frontend.site.all-service',compact('page','service','master','isactive'));
                }
                elseif($data->slug == 'tat-ca-anh' || $data->slug == 'all-gallery'){

                    $data = Gallery::orderby('id','desc')->orderBy('stt','asc')->get();
                    return view('frontend.site.all-gallery',compact('page','data','master'));
                }
                  break;
                case('App\Models\Product');
                $isactive = 'san-pham';
                $product = Product::with('translations')->with('images')->where('id',$data->trans_id)->FirstOrFail();
                $relatedproduct = Product::where('id','!=',$product->id)->where('procatone_id',$product->procatone_id)->get();
                $master =   [
                    'name' => $product->translations->name,
                    'title' => $product->translations->title,
                    'keywords' => $product->translations->keywords,
                    'description' => $product->translations->description,
                    'descriptions' => $product->translations->descriptions,
                    'img' => 'products/'.$product->img,
                    'type' => 'product',
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at
                            ];
                    return view('frontend.site.product',compact('product','relatedproduct','master','isactive'));
                break;
                case('App\Models\Post');
                $isactive ='tin-tuc';
                $post = Post::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $relatedpost = Post::with('translations')->where('id','!=',$post->id)->where('newcatone_id',$post->newcatone_id)->orderby('stt','asc')->orderby('id','desc')->paginate(6);
                $master =   [
                    'name' => $post->translations->name,
                    'title' => $post->translations->title,
                    'keywords' => $post->translations->keywords,
                    'description' => $post->translations->description,
                    'descriptions' => $post->translations->descriptions,
                    'img' => 'post/'.$post->img,
                    'type' => 'article',
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at
                            ];
                    return view('frontend.site.post',compact('post','relatedpost','master','isactive'));
                break;
                case('App\Models\Servi');
                $isactive='dich-vu';
                $post = Servi::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $relatedpost = Servi::with('translations')->where('id','!=',$post->id)->where('svcategory_id',$post->svcategory_id)->orderby('stt','asc')->orderby('id','desc')->paginate(6);
                $master =   [
                    'name' => $post->translations->name,
                    'title' => $post->translations->title,
                    'keywords' => $post->translations->keywords,
                    'description' => $post->translations->description,
                    'descriptions' => $post->translations->descriptions,
                    'img' => 'servis/'.$post->img,
                    'type' => 'article',
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at
                            ];
                    return view('frontend.site.service',compact('post','relatedpost','master','isactive'));
                break;
                case('App\Models\Newcatone');
                $isactive = 'tin-tuc';
                $newcatone = Newcatone::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $post = Post::where('newcatone_id',$newcatone->id)->orderby('stt','asc')->orderby('id','desc')->paginate(6);
                $master =   [
                    'name' => $newcatone->translations->name,
                    'title' => $newcatone->translations->title,
                    'keywords' => $newcatone->translations->keywords,
                    'description' => $newcatone->translations->description,
                    'descriptions' => $newcatone->translations->descriptions,
                    'img' => 'newcatone/'.$newcatone->img,
                    'type' => 'article',
                    'created_at' => $newcatone->created_at,
                    'updated_at' => $newcatone->updated_at
                            ];
                    return view('frontend.site.catepost',compact('newcatone','post','master','isactive'));
                break;
                case('App\Models\Procatone');
                $isactive='san-pham';
                $procatone = Procatone::where('id',$data->trans_id)->FirstOrFail();
                $product = Product::where('procatone_id',$procatone->id)->paginate(6);
                $master =   [
                    'name' => $procatone->translations->name,
                    'title' => $procatone->translations->title,
                    'keywords' => $procatone->translations->keywords,
                    'description' => $procatone->translations->description,
                    'descriptions' => $procatone->translations->descriptions,
                    'img' => 'procatones/'.$procatone->img,
                    'created_at' => $procatone->created_at,
                    'updated_at' => $procatone->updated_at
                            ];
                    return view('frontend.site.procatone',compact('procatone','product','master','isactive'));
                break;
                case('App\Models\Procattwo');
                $isactive='san-pham';
                $procattwo = Procattwo::where('id',$data->trans_id)->FirstOrFail();
                $product = Product::where('procattwo_id',$procattwo->id)->paginate(6);
                $master =   [
                    'name' => $procattwo->translations->name,
                    'title' => $procattwo->translations->title,
                    'keywords' => $procattwo->translations->keywords,
                    'description' => $procattwo->translations->description,
                    'descriptions' => $procattwo->translations->descriptions,
                    'img' => 'procattwo/'.$procattwo->img,
                    'created_at' => $procattwo->created_at,
                    'updated_at' => $procattwo->updated_at
                            ];
                    return view('frontend.site.procattwo',compact('procattwo','product','master','isactive'));
                break;
                case('App\Models\Svcategory');
                $isactive = 'dich-vu';
                $cateservice = Svcategory::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $post = Servi::where('svcategory_id',$cateservice->id)->orderby('stt','asc')->orderby('id','desc')->paginate(6);
                $master =   [
                    'name' => $cateservice->translations->name,
                    'title' => $cateservice->translations->title,
                    'keywords' => $cateservice->translations->keywords,
                    'description' => $cateservice->translations->description,
                    'descriptions' => $cateservice->translations->descriptions,
                    'img' => 'svcategory/'.$cateservice->img,
                    'type' => 'article',
                    'created_at' => $cateservice->created_at,
                    'updated_at' => $cateservice->updated_at
                            ];
                return view('frontend.site.cateservice',compact('cateservice','master','post','isactive'));
                break;
                case('App\Models\Gallery');
                $isactive='hoat-dong';
                $gallery = Gallery::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $master =   [
                    'name' => $gallery->translations->name,
                    'title' => $gallery->translations->title,
                    'keywords' => $gallery->translations->keywords,
                    'description' => $gallery->translations->description,
                    'descriptions' => $gallery->translations->descriptions,
                    'img' => 'gallery/'.$gallery->img,
                    'type' => 'image',
                    'created_at' => $gallery->created_at,
                    'updated_at' => $gallery->updated_at
                            ];
                return view('frontend.site.gallery',compact('gallery','master','isactive'));
                break;
                case('App\Models\Videocat');
                $isactive='hoat-dong';
                $gallery = Videocat::with('translations')->where('id',$data->trans_id)->FirstOrFail();
                $video = Video::where('videocat_id',$gallery->id)->orderby('stt','asc')->orderby('id','desc')->paginate(8);
                $master =   [
                    'name' => $gallery->translations->name,
                    'title' => $gallery->translations->title,
                    'keywords' => $gallery->translations->keywords,
                    'description' => $gallery->translations->description,
                    'descriptions' => $gallery->translations->descriptions,
                    'img' => 'gallery/'.$gallery->img,
                    'type' => 'image',
                    'created_at' => $gallery->created_at,
                    'updated_at' => $gallery->updated_at
                            ];
                return view('frontend.site.videocate',compact('gallery','master','isactive','video'));
                break;
                case('App\Models\Recruitment');
                $isactive = 'tuyen-dung';
                $recruitment = Recruitment::where('id',$data->trans_id)->FirstOrFail();
                $master =   [
                    'name' => $recruitment->translations->name,
                    'title' => $recruitment->translations->title,
                    'keywords' => $recruitment->translations->keywords,
                    'description' => $recruitment->translations->description,
                    'descriptions' => $recruitment->translations->descriptions,
                    'img' => 'recruitments/'.$recruitment->img,
                    'created_at' => $recruitment->created_at,
                    'updated_at' => $recruitment->updated_at
                            ];
                    return view('frontend.site.recruitment',compact('recruitment','master','isactive'));
                break;
                return redirect()->back();
                default;
            }
        }

    }
