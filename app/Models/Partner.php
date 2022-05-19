<?php

namespace App\Models;
use App\Models\BaseModel;

class Partner extends BaseModel
{
    protected $fillable = ['id','name','img','hide_show','stt','url'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Partner::class);
    }

}
