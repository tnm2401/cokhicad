<?php

namespace App\Models;

use App\Models\BaseModel;

class Stepwork extends BaseModel

{
    protected $table = 'stepworks';
    protected $fillable = ['id','stt','hide_show','color'];
    public $timestamps = false;

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Stepwork::class);
    }
}
