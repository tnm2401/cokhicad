<?php
    namespace App\Http\Controllers\Frontend;
    use App\Http\Controllers\ShareController;
    use Illuminate\Http\Request;
    use Session;
    use Route;
    use Translation;
    use Str;
    class LangController extends ShareController
    {
        public function index($locale){
            session()->put('locale', $locale);
                $slug = str_replace(url(''), '', url()->previous());
                $replaced = Str::replace('.html', '', $slug);
                $data = Translation::where('slug',ltrim($replaced, "/"))->first();
               if($data !== null){
                     $newdata = Translation::where('trans_id',$data->trans_id)
                     ->where('trans_type',$data->trans_type)
                     ->where('locale',$locale)->first();
                   return redirect("/$newdata->slug.html");
               }
               else{
                   return redirect()->back();
               }
        }
        public function changelocale($locale){
            session()->put('locale', $locale);
            return redirect()->back();
        }

    }
