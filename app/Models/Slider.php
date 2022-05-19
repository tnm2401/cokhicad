<?php

namespace App\Models;
use App\Models\BaseModel;

class Slider extends BaseModel
{
    protected $fillable = ['id','url','stt','hide_show','img'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Slider::class);
    }

}
