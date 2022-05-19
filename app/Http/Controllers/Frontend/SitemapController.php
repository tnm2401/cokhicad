<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\ShareController;
    use Illuminate\Http\Request;
    use Jenssegers\Agent\Agent;
    use Illuminate\Support\Str;
    use Illuminate\Database\Eloquent\Model;
    use Carbon\Carbon;
    use Cache;
    use Session;
    use Procatone;
    use Procattwo;
    use Product;
    use Newcatone;
    use Post;
    use Page;
    use Videocat;
    use Svcategory;
    use Servi;
    use Video;
    class SitemapController extends ShareController
    {
        public function sitemap()
        {
            $lang = Session::get('locale');
            if (Session::get('locale') == null) {
                $lang = 'vi';
            }else{
                $lang = Session::get('locale');
            }
            $data['procatone'] = Procatone::whereHide_show(1)->get();
            $data['procattwo'] = Procattwo::whereHide_show(1)->get();
            $data['product'] = Product::whereHide_show(1)->get();
            $data['servicecate'] = Svcategory::whereHide_show(1)->get();
            $data['service'] = Servi::whereHide_show(1)->get();
            $data['newcatone'] = Newcatone::whereHide_show(1)->get();
            $data['post'] = Post::whereHide_show(1)->get();
            $data['page'] = Page::whereHide_show(1)->get();
            $data['videocat'] = Videocat::whereHide_show(1)->get();
            $data['video'] = Video::whereHide_show(1)->get();
            return response()->view('frontend.sitemaps.index', compact('data','lang'))->header('Content-Type', 'text/xml');
        }
    }
