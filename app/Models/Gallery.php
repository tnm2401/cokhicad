<?php

namespace App\Models;
use App\Models\BaseModel;

class Gallery extends BaseModel
{
    protected $fillable = ['id','type','img','hide_show','stt'];

    public function images()
    {
        return $this->hasMany(Productsimage::class,'product_id')->orderBy('id','desc')->whereType(3);
    }

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Gallery::class);
    }

    // public function feedback()
    // {
    //     return $this->hasMany(Productsimage::class,'product_id')->whereType(3);
    // }


}
