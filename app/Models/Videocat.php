<?php

namespace App\Models;

use App\Models\BaseModel;

class Videocat extends BaseModel

{
    protected $fillable = ['id','type','view_count','img','stt','hide_show'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Videocat::class);
    }
}
