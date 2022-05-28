<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Translation;
use Product;
use Productsimage;
use App\User;
use Procatone;
use Procattwo;
use Procatthree;
use TagTranslation;
use Tag,DB;
use ProductTag;
use Cache;
use Image;
use Validate;
use Language;
use Carbon\Carbon;
use Validator;
use File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class ProductController extends ShareController
{
    public function index()
    {
        $products = Product::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        $procatones = Procatone::with('translations')->get();
        return view('backend.products.index', compact('products','procatones'));
    }

    public function select(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'procatone') {
                $select_procattwo = Procattwo::where('procatone_id',$data['code_id'])->orderBy('id','ASC')->get();
                $output.='<option value="">Chọn cấp 2</option>';
                foreach ($select_procattwo as $key => $procattwo){
                    $output.='<option value="'.$procattwo->name.'" data-id="'.$procattwo->id.'">'.$procattwo->name.'</option>';
                }
            }else{
                $select_procatthree = Procatthree::where('procattwo_id',$data['code_id'])->orderBy('id','ASC')->get();
                $output.='<option value="">Chọn cấp 3</option>';
                foreach ($select_procatthree as $key => $procatthree){
                    $output.='<option value="'.$procatthree->name.'" data-id="'.$procatthree->id.'">'.$procatthree->name.'</option>';
                }
            }
        }
        echo $output;
    }

    public function select_option(Request $request){
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'procatone') {
                $select_procattwo = Procattwo::with('translations')->where('procatone_id',$data['code_id'])->orderBy('stt','asc')->orderBy('id','desc')->get();
                $output.='<option value="">Chọn cấp 2</option>';
                foreach ($select_procattwo as $key => $procattwo){
                    $output.='<option value="'.$procattwo->id.'">'.$procattwo->translations->name.'</option>';
                }
            }else{
                $select_procatthree = Procatthree::with('translations')->where('procattwo_id',$data['code_id'])->orderBy('stt','asc')->orderBy('id','desc')->get();
                $output.='<option value="">Chọn cấp 3</option>';
                foreach ($select_procatthree as $key => $procatthree){
                    $output.='<option value="'.$procatthree->id.'">'.$procatthree->translations->name.'</option>';
                }
            }
        }
        echo $output;
    }

    public function create()
    {
        $tags = Tag::with('translations')->whereType('product')->whereHide_show(1)->get();
        $procatones = Procatone::with('translations')->orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.products.create', compact('procatones','tags'));
    }
    public function edit(Request $request, $id)
    {
        $procatones = Procatone::orderBy('stt','asc')->orderBy('id','desc')->get();
        $procattwos = Procattwo::orderBy('stt','asc')->orderBy('id','desc')->get();
        $procatthrees = Procatthree::orderBy('stt','asc')->orderBy('id','desc')->get();
        $id_category = array();
        $product = Product::with('get_tags')->find($id);
        // lấy tất cả tag
        $tags1 = json_decode(Tag::whereType('product')->whereHide_show(1)->pluck('id'));
        // lấy tag của sản phẩm đó
        $tags2 = json_decode(ProductTag::where('product_id',$id)->pluck('tag_id'));
        // lọc ra tag đã hiển thị
        $result = array_diff($tags1, $tags2);
        // show những tag còn lại
        $tags = Tag::with('translations')->whereType('product')->whereIn('id',$result)->get();
        $images = $product->images;
        $json = $product->imgs;
        $json = json_decode($json, true);
        return view('backend.products.edit', compact('product','json','images','id_category','procatones','procattwos','procatthrees','tags'));
    }
    public function store(Request $request)
    {
        $lang = [
            'vi.name.required' => 'Vui lòng nhập tên Tiếng Việt !',
            'vi.slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
            'vi.slug.unique' => 'URL Tiếng Việt đã tồn tại',
            'en.name.required' => 'Vui lòng nhập tên Tiếng Anh !',
            'en.slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
            'en.slug.unique' => 'URL Tiếng Anh đã tồn tại',
        ];
        $validator = Validator::make(request()->translation, [
            '*.name' => 'required',
            '*.slug' => 'required|unique:translations',
        ],$lang);
        $validated = $validator->validated();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/products', $name_save);
        } else {
            $name_save = 'placeholder.png';
        }
        if ($request->price == '') {
            $price = 0;
            $selling_price = 0;
        } else {
            $price = str_replace(',', '',(number_format(str_replace(',', '', $request->price))));
            $selling_price = str_replace(',', '',(number_format(str_replace(',', '', $request->price) - (str_replace(',', '', $request->price) * ($request->discount / 100)))));
        }
        if ($request->discount == '') {
            $discount = 0;
        } else {
            $discount = $request->discount;
        }
        $data = [
            'stt' => $request->stt ?? false,
            'procatone_id' => $request->procatone,
            'procattwo_id' => $request->procattwo,
            'procatthree_id' => $request->procatthree,
            'product_code' => $request->product_code,
            'price' => $price ?? false,
            'selling_price' => $selling_price ?? false,
            'discount' => $discount ?? false,
            'is_featured' => $request->is_featured ?? false,
            'is_new' => $request->is_new ?? false,
            'hide_show' => $request->hide_show ?? false,
            'img'  => $name_save,
        ];
        $product = Product::create($data);
        $product->translations()->createMany($request->translation);
        if($request->tags)
        for ($i = 0; $i < count($request->tags); $i++) {
            if (TagTranslation::where('tag_id', '=', $request->tags[$i])->exists()) {
                // trùng tag thì bỏ
                // đẩy data vào bảng tag_product ( trùng )
                $producttag_default = new ProductTag();
                $producttag_default->tag_id = json_decode($request->tags[$i]);
                $producttag_default->product_id = $product->id;
                $producttag_default->save();
                //done
                 } else {
                //  insert data vào tag và translation_tag
                    $tags = new  Tag();
                    $tags->type = 'product' ?? false;
                    $tags->hide_show = true;
                    $tags->stt = true;
                    $tags->save();
                    //done
                    // đẩy data vào tag_product ( k trùng)
                    $producttag= new ProductTag();
                    $producttag->tag_id = $tags->id;
                    $producttag->product_id = $product->id;
                    $producttag->save();
                    //done
                    //đẩy tag vào bảng dịch ( lấy theo số lượng ngôn ngữ hiện có)
                    $language = Language::get();
                    foreach($language as $lang){
                    $tag_tran = new TagTranslation();
                    $tag_tran->tag_id = $tags->id;
                    $tag_tran->locale = $lang->locale;
                    $tag_tran->name = $request->tags[$i];
                    $tag_tran->slug = Str::slug($tag_tran->name);
                    $tag_tran->save();
                    //done
                }
            }
        }
        $product_id = $product->id;
        $inputImgs = $request->all();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file){
                if($file->isValid()){
                    $full_name_img = $file->getClientOriginalName();
                    $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                    $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                    $ext = $file->getClientOriginalExtension();
                    $name_save_slug = Str::slug($name_without_ext, '-');
                    $current_time = Carbon::now()->format('Hs');
                    $name_img = $name_save_slug.'-'.$current_time.'.'.$ext;
                    $res = $file->storeAs('public/uploads/products', $name_img);
                    Productsimage::create([
                                            'product_id' => $product_id,
                                            'imgs' => $name_img
                                         ]);
                }
            }
        }
        if ($product) {
            alert()->success("Thành công !","Đã thêm sản phẩm mới !");
            return redirect()->route('backend.product.index');
        }
            alert()->error("Lỗi !","Thêm sản phẩm thất bại !");
            return redirect()->route('backend.product.index');

    }
    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Product')->where('locale',session('locale'))->first()->id;
        $product = Product::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Việt !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Việt !',
                'slug.unique' => 'URL Tiếng Việt đã tồn tại',
            ];
        } else {
            $lang = [
                'name.required' => 'Vui lòng nhập tên Tiếng Anh !',
                'slug.required' => 'Vui lòng nhập URL Tiếng Anh !',
                'slug.unique' => 'URL Tiếng Anh đã tồn tại',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'slug' => 'required|unique:translations,slug,'.$id_unique_skip,
            'name' => 'required',
        ],$lang);
        $validated = $validator->validated();
        if (!$request->hasFile('img')) {
            $name_save = $product->img;
        } else {
            $file = $request->file('img');
            $full_name_img = $file->getClientOriginalName();
            $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = $file->getClientOriginalExtension();
            $name_save_slug = Str::slug($name_without_ext, '-');
            $current_time = Carbon::now()->format('Hs');
            $name_save = $name_save_slug.'-'.$current_time.'.'.$ext;
            $res = $file->storeAs('public/uploads/products', $name_save);
            $image_path = public_path().'/storage/uploads/products/'.$product->img;
            if (file_exists($image_path) && $product->img != 'placeholder.png') {
                unlink($image_path);
            }
        }
        if ($request->price == '') {
            $price = 0;
            $selling_price = 0;
        }else {
            $price = str_replace(',', '',(number_format(str_replace(',', '', $request->price))));
            $selling_price = str_replace(',', '',(number_format(str_replace(',', '', $request->price) - (str_replace(',', '', $request->price) * ($request->discount / 100)))));
        }
        if ($request->discount == '') {
            $discount = 0;
        } else {
            $discount = $request->discount;
        }
        $product->stt           = $request->stt;
        $product->is_featured   = $request->is_featured;
        $product->is_new        = $request->is_new;
        $product->procatone_id  = $request->procatone;
        $product->procattwo_id  = $request->procattwo;
        $product->procatthree_id = $request->procatthree;
        $product->product_code  = $request->product_code;
        $product->price         = $price;
        $product->selling_price = $selling_price;
        $product->discount      = $discount;
        $product->hide_show     = $request->hide_show;
        $product->img           = $name_save;
        $product->translations()->update($request->translation);
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        $product->save();

        if($request->tags){
            // dd(array_unique($request->tags));

            // $request->tags = (array_unique($request->tags));
            $producttag_default_old = ProductTag::where('product_id',$product->id)->delete(); // lấy data cũ và xóa
            for ($i = 0; $i < count($request->tags); $i++) {
                // dd($request->tags);
                if (TagTranslation::where('tag_id', '=', $request->tags[$i])->exists()) {
                    // trùng tag thì bỏ
                    // // đẩy data vào bảng tag_product ( trùng )
                    $producttag_default = new ProductTag();
                    $producttag_default->tag_id = json_decode($request->tags[$i]);
                    $producttag_default->product_id = $product->id;
                    $producttag_default->save();
                    // //done
                } else {
                    //  insert data vào tag và translation_tag
                    $tags = new Tag();
                    $tags->type = 'product' ?? false;
                    $tags->hide_show = true;
                    $tags->stt = true;
                    $tags->save();
                    // done
                    // đẩy data vào tag_product (k trùng)
                    $producttag= new ProductTag();
                    $producttag->tag_id = $tags->id;
                    $producttag->product_id = $product->id;
                    $producttag->save();
                    // done
                    // đẩy tag vào bảng dịch ( lấy theo số lượng ngôn ngữ hiện có)
                    $language = Language::get();
                    foreach($language as $lang){
                    $tag_tran = new TagTranslation();
                    $tag_tran->tag_id = $tags->id;
                    $tag_tran->locale = $lang->locale;
                    $tag_tran->name = $request->tags[$i];
                    $tag_tran->slug = Str::slug($tag_tran->name);
                    $tag_tran->save();
                    // done
                    }
                }
            }
        }
        $product_id = $product->id;
        $inputImgs = $request->all();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file){
                if($file->isValid()){
                    $full_name_img = $file->getClientOriginalName();
                    $find_ext_last = Str::replaceLast('.', '.', $full_name_img);
                    $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                    $ext = $file->getClientOriginalExtension();
                    $name_save_slug = Str::slug($name_without_ext, '-');
                    $current_time = Carbon::now()->format('Hs');
                    $name_img = $name_save_slug.'-'.$current_time.'.'.$ext;
                    $res = $file->storeAs('public/uploads/products', $name_img);
                    Productsimage::create([
                                            'product_id' => $product_id,
                                            'imgs' => $name_img
                                         ]);
                    // Productsimage::create($inputImgs);
                }
            }
        }
        alert()->success("Thành công !","Đã cập nhật sản phẩm !");
        return redirect()->route('backend.product.index');
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $img_name = $product->img;
        $find_ext_last = Str::replaceLast('.', '.', $img_name);
        $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
        $ext = Str::of($find_ext_last)->afterLast('.');
        $img_size_medium = '278x278';
        $img_size_small = '74x48';
        $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
        $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
        if ($product) {
            if ($product->img != 'placeholder.png') {
                $image_path = public_path().'/storage/uploads/products/'.$product->img;
                if( File::exists($image_path)){
                    unlink($image_path);
                }
            }
            $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
            $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
            if (file_exists($image_path_frontend_medium)) {
                unlink($image_path_frontend_medium);
            }
            if (file_exists($image_path_frontend_small)) {
                unlink($image_path_frontend_small);
            }
            $images = Productsimage::select('id','imgs')->where('product_id',$product->id)->get();
            foreach($images as $image){
                if ($image->imgs != 'NULL') {
                    $images_path = public_path().'/storage/uploads/products/'.$image->imgs;
                    unlink($images_path);
                }
                $imgs_name = $image->imgs;
                $find_ext_last = Str::replaceLast('.', '.', $imgs_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $imgs_size_small = '74x48';
                $imgs_size_del_small = $name_without_ext.'-'.$imgs_size_small.'.'.$ext;
                $imgs_path_frontend_small = public_path().'/frontend/thumb/'.$imgs_size_del_small;
                if (file_exists($imgs_path_frontend_small)) {
                    unlink($imgs_path_frontend_small);
                }
            }
            $product->delete();
            $product->delete_trans()->delete();
            alert()->success("Thành công !","Đã Xóa sản phẩm !");
            return redirect()->route('backend.product.index');
        }
            alert()->error("Lỗi !","Xóa sản phẩm không thành công !");
            return redirect()->route('backend.product.index');
    }
    public function delete($id){
        $image = Productsimage::find($id);
        if ($image) {
            $image_path_del = public_path().'/storage/uploads/products/'.$image->imgs;
            if( File::exists($image_path_del)){
                unlink($image_path_del);
            }
            $imgs_name = $image->imgs;
            $find_ext_last = Str::replaceLast('.', '.', $imgs_name);
            $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
            $ext = Str::of($find_ext_last)->afterLast('.');
            $imgs_size_small = '92x60';
            $imgs_size_del_small = $name_without_ext.'-'.$imgs_size_small.'.'.$ext;
            $imgs_path_backend_small = public_path().'/backend/thumb/'.$imgs_size_del_small;
            if (file_exists($imgs_path_backend_small)) {
                unlink($imgs_path_backend_small);
            }
        }
        $image->delete($id);
        return response()->json(['status'=>true,'message'=>'Xoá thành công !']);
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        $images = Product::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                // img index
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/products/'.$image->img;
                    if( File::exists($image_path)){
                        unlink($image_path);
                    }
                }
                // img small & medium
                $img_name = $image->img;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '74x48';
                $img_size_medium = '278x278';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
                $imgs_dels = Productsimage::where('product_id',$image->id)->get();
                foreach($imgs_dels as $img_del) {
                    $imgs_path = public_path().'/storage/uploads/products/'.$img_del->imgs;
                    if( File::exists($image_path)){
                        unlink($image_path);
                    }
                    $imgs_name = $img_del->imgs;
                    $find_ext_last = Str::replaceLast('.', '.', $imgs_name);
                    $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                    $ext = Str::of($find_ext_last)->afterLast('.');
                    $imgs_size_small = '74x48';
                    $imgs_size_del_small = $name_without_ext.'-'.$imgs_size_small.'.'.$ext;
                    $imgs_path_frontend_small = public_path().'/frontend/thumb/'.$imgs_size_del_small;
                    if (file_exists($imgs_path_frontend_small)) {
                        unlink($imgs_path_frontend_small);
                    }
                    $img_del->delete();
                }
            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Product')->delete();
        Product::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các sản phẩm đã chọn !']);
    }

    public function delete_all_image_detail(Request $request){
        $id = $request->id;
        $img_detail = Productsimage::where('product_id',$id)->pluck('id');
        $images = Productsimage::whereIn('id',$img_detail)->get();
        if ($id) {
            foreach($images as $image){
                // img index
                if ($image->img != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/products/'.$image->imgs;
                    if( File::exists($image_path)){
                        unlink($image_path);
                    }
                }
                // img small & medium
                $img_name = $image->imgs;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '74x48';
                $img_size_medium = '278x278';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
                $image->delete();
            }
        }
        return response()->json(['status'=>true,'message'=>'Xoá thành công tất cả các hình !']);
    }

    public function deletemultiple_imgdetail(Request $request){
        $ids = $request->ids;
        $images = Productsimage::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                // img index
                if ($image->imgs != 'placeholder.png') {
                    $image_path = public_path().'/storage/uploads/products/'.$image->imgs;
                    if( File::exists($image_path)){
                        unlink($image_path);
                    }
                }
                // img small & medium
                $img_name = $image->imgs;
                $find_ext_last = Str::replaceLast('.', '.', $img_name);
                $name_without_ext = Str::of($find_ext_last)->beforeLast('.');
                $ext = Str::of($find_ext_last)->afterLast('.');
                $img_size_small = '74x48';
                $img_size_medium = '278x278';
                $img_size_del_small = $name_without_ext.'-'.$img_size_small.'.'.$ext;
                $img_size_del_medium = $name_without_ext.'-'.$img_size_medium.'.'.$ext;
                $image_path_frontend_small = public_path().'/frontend/thumb/'.$img_size_del_small;
                $image_path_frontend_medium = public_path().'/frontend/thumb/'.$img_size_del_medium;
                if (file_exists($image_path_frontend_small)) {
                    unlink($image_path_frontend_small);
                }
                if (file_exists($image_path_frontend_medium)) {
                    unlink($image_path_frontend_medium);
                }
                $image->delete();

            }
        }
        $translation = Translation::whereIn('trans_id',explode(",",$ids))->where('trans_type','App\Models\Product')->delete();
        Product::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các sản phẩm đã chọn !']);
    }

    public function ChangeIsFeatured(Request $request){
        $product = Product::find($request->product_id);
        $product->is_featured = $request->is_featured;
        $product->save();
        return response()->json(['success'=>'Product Is Featured change successfully.']);
    }
    public function ChangeIsNew(Request $request){
        $product = Product::find($request->product_id);
        $product->is_new = $request->is_new;
        $product->save();
        return response()->json(['success'=>'Product Is New change successfully.']);
    }
    public function hideShow(Request $request){
        $product = Product::find($request->product_id);
        $product->hide_show = $request->hide_show;
        $product->save();
        return response()->json(['success'=>'Product Hide Show change successfully.']);
    }
    public function changeStt(Request $request){
        $product = Product::find($request->product_id);
        $product->stt = $request->stt;
        $product->save();
        return response()->json(['success'=>'Product STT change successfully.']);
    }
}
