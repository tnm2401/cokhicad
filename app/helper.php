<?php
    function deleteMultiLevel($data,$parent_id) {
        $path = array();
        foreach ($data as $productcategory) {
            if ($productcategory->parent_id == $parent_id) {
                $path[] = $productcategory->id;
                $path = array_merge(deleteMultiLevel($data,$productcategory->id), $path);
            }
        }
        return $path;
    }
    function recursiveSelect($data, int $parent_id = 1, &$array = array())
    {
        foreach ($data as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $array[] = $item->id;
                unset($data[$key]);
                recursiveSelect($data, $item->id, $array);
            }
        }
    }
    function product_price($price) {
        $symbol = '₫';
        $symbol_thousand = ',';
        $decimal_place = 0;
        $price = number_format($price, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
    }
    function product_price_view($price) {
        $symbol_thousand = ',';
        $decimal_place = 0;
        $price = number_format($price, $decimal_place, '', $symbol_thousand);
        return $price;
    }
    function imageUrl($path,$width = NULL,$height = NULL,$quality=NULL,$crop=NULL, $thumb=5) {
            if(!$width && !$height) {
                $url = env('IMAGE_URL') . $path;
            } else {
                $url = url('/') . '/timthumb.php?src=' . env('IMAGE_URL') . $path;
                if(isset($width)) {
                    $url .= '&w=' . $width;
                }
                if(isset($height) && $height>0) {
                    $url .= '&h=' .$height;
                }
                if(isset($crop))
                {
                    $url .= "&zc=".$crop;
                }
                else
                {
                    $url .= "&zc=1";
                }
                if(isset($quality))
                {
                    $url .='&q='.$quality.'&s=1';
                }
                else
                {
                    $url .='&q=95&s=1';
                }
            }
            $file_name = basename(formatImage ($path, $width, $height));

            if (!file_exists(public_path()."/frontend/thumb/".$file_name)) {
                if(file_put_contents(public_path()."/frontend/thumb/".$file_name,file_get_contents($url))) {
                    return asset("/frontend/thumb/".$file_name);
                } else {
                    return "Error";
                }
            } else {
                return asset("/frontend/thumb/".$file_name);
            }
    }
    function formatImage ($filename, $width, $height) {
        $part_filename = explode(".", $filename);
        $file_name_origin = $part_filename[0];
        return str_replace($file_name_origin, $file_name_origin."-".$width."x".$height, $filename);
    }
    function imageUrlBackend($path,$width = NULL,$height = NULL,$quality=NULL,$crop=NULL) {
        if(!$width && !$height) {
            $url = env('IMAGE_URL') . $path;
        } else {
            $url = url('/') . '/timthumb.php?src=' . env('IMAGE_URL') . $path;

            if(isset($width)) {
                $url .= '&w=' . $width;
            }

            if(isset($height) && $height>0) {
                $url .= '&h=' .$height;
            }
            if(isset($crop))
            {
                $url .= "&zc=".$crop;
            }
            else
            {
                $url .= "&zc=1";
            }

            if(isset($quality))
            {
                $url .='&q='.$quality.'&s=1';
            }
            else
            {
                $url .='&q=95&s=1';
            }
        }
        $file_name = basename(formatImageBackend($path, $width, $height));
        if (!file_exists(public_path()."/backend/thumb/".$file_name)) {
            if(file_put_contents(public_path()."/backend/thumb/".$file_name,file_get_contents($url))) {
                return asset("/backend/thumb/".$file_name);
            } else {
                return "Error";
            }
        } else {
            return asset("/backend/thumb/".$file_name);
        }
    }
    function formatImageBackend($filename, $width, $height) {
        $part_filename = explode(".", $filename);
        $file_name_origin = $part_filename[0];
        return str_replace($file_name_origin, $file_name_origin."-".$width."x".$height, $filename);
    }
    function thumbBE($path,$width = NULL,$height = NULL,$quality=NULL,$crop=NULL) {
        if(!$width && !$height) {
            $url = env('IMAGE_URL') . $path;
        } else {
            $url = url('/') . '/timthumb.php?src=' . env('IMAGE_URL') . $path;

            if(isset($width)) {
                $url .= '&w=' . $width;
            }

            if(isset($height) && $height>0) {
                $url .= '&h=' .$height;
            }
            if(isset($crop))
            {
                $url .= "&zc=".$crop;
            }
            else
            {
                $url .= "&zc=1";
            }

            if(isset($quality))
            {
                $url .='&q='.$quality.'&s=1';
            }
            else
            {
                $url .='&q=95&s=1';
            }
        }
        $file_name = basename(formatImageBackend($path, $width, $height));
        if (!file_exists(public_path()."/backend/thumb/".$file_name)) {
            if(file_put_contents(public_path()."/backend/thumb/".$file_name,file_get_contents($url))) {
                return asset("/backend/thumb/".$file_name);
            } else {
                return "Error";
            }
        } else {
            return asset("/backend/thumb/".$file_name);
        }
    }

    function hasRole($role)
    {
        if (!empty(\Auth::user()->role_id)) {
            $user_role_id = \Auth::user()->role_id;
            $role_obj     = \DB::table('roles')->where('id',$user_role_id)->first();
            $role_array   = json_decode($role_obj->permissions);
            if (in_array($role,$role_array)) {
                return true;
            }
        }
        return false;
    }

    function checkedRole ($array,$item) {
        if (is_array($array) && in_array($item,$array)) {
            echo 'checked';
        } else {
            echo '';
        }
    }

    function checked ($array,$item) {
        if (is_array($array) && in_array($item,$array)) {
            echo 'checked';
        } else {
            echo '';
        }
    }

    function checksale ($array,$item) {
        if (is_array($array) && in_array($item,$array)) {
            echo 'sale_product';
        } else {
            echo '';
        }
    }

    //Scan file
if(!function_exists('scan_full_dir')){
    function scan_full_dir($dir,$child = false){
        $icon = ['/','_'];
        $dir_content_list = scandir($dir);
        foreach($dir_content_list as $k=>$value){
            $path = $dir.$icon[0].$value;
            // cái nào cấm thì khai báo vào
            $arr = ['.','..','Admin','Auth','Console','Events','Commands','Services','Handlers','Exceptions','Providers', 'Requests','Kernel.php','route.php','fonts','font','font-awesome'];
            if(in_array($value,$arr))  {continue;}
            $explode = explode('.',$value);
            $replace = str_replace(array('/','.'),array('_',''), $dir);
            $ext = 'php';
            $event = null;
            $pic = "fa-duotone fa-image";
            $folder = "fa-duotone fa-folder";
            $css= "fa-brands fa-css3-alt";
            $script = "fa-brands fa-js";
            $privat = "fa-duotone fa-file-lock";
            $html ="fa-brands fa-html5";
            $php = "fa-brands fa-php";

            if(in_array('html',$explode) && $child){
                $ext = "html";
                $folder = $html;
                $event = "id='show-file'";
            }
            if(in_array('css',$explode) && $child){
                $ext = "css";
                $folder = $css;
                $event = "id='show-file'";
            }
            if(in_array('scss',$explode) && $child){
                $ext = "scss";
                $folder = $css;
                $event = "id='show-file'";
            }
            if(in_array('php',$explode) && $child){
                $ext = "php";
                $folder = $php;
                $event = "id='show-file'";
            }
            if(in_array('js',$explode) && $child){
                $ext = "js";
                $folder = $script;
                $event = "id='show-file'";
            }
            if(in_array('jpg',$explode) && $child){
                $ext = "image";
                $folder = $pic;
            }
            if(in_array('jpeg',$explode) && $child){
                $ext = "image";
                $folder = $pic;
                $event = "id='show-file'";

            }
            if(in_array('png',$explode) && $child){
                $ext = "image";
                $folder = $pic;
            }
            if(in_array('svg',$explode) && $child){
                $ext = "image";
                $folder = $pic;
            }
            if(in_array('gif',$explode) && $child){
                $ext = "image";
                $folder = $pic;
            }
            if(in_array('ico',$explode) && $child){
                $ext = "image";
                $folder = $pic;

            }

            if(in_array('htaccess',$explode) && $child){
                $ext = "htaccess";
                $folder = $privat;
            }

            // check if we have file
            if(is_file($path)) {
                // echo '<li class="file-name text-primary" '.$event.' data-path="'.$path.'" data-ext="'.$ext.'"><i class="icon-img"><img src="'.$folder.'"></i> '.$value.'</li>';
                // continue;
                echo '<li class="file-name text-primary" '.$event.' data-path="'.$path.'" data-ext="'.$ext.'"><i class="'.$folder.'"></i> '.$value.'</li>';
                continue;
            }
            // check if we have directory
            if (is_dir($path)) {
                if(!$child){
                    echo '<li class="folder-name"><a href="javascript:void(0)" id="open-folder" class="open-folder text-primary" data-path="'.$replace.$icon[1].$value.$icon[1].$k.'"><i class="'.$folder.'"></i> '.$value.'</a>';
                    echo '<ul class="parent-folder" id="'.$replace.$icon[1].$value.$icon[1].$k.'">';
                    scan_full_dir($dir.$icon[0].$value,$value);
                    echo '</ul>';
                    echo '</li>';
                }else{
                    echo '<li class="folder-sub"><a href="javascript:void(0)" id="open-sub-folder" class="open-sub-folder text-primary" data-path="'.$replace.$icon[1].$value.$icon[1].$k.'"><i class="'.$folder.'"></i> '.$value.'</a>';
                    echo '<ul class="parent-folder" id="'.$replace.$icon[1].$value.$icon[1].$k.'">';
                    scan_full_dir($dir.$icon[0].$value,$value);
                    echo '</ul>';
                    echo '</li>';
                }
            }
        }
    }

}

