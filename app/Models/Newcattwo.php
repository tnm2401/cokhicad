<?php

namespace App\Models;

use App\Models\BaseModel;

class Newcattwo extends BaseModel

{
    protected $fillable = ['id','img','stt','hide_show','show_nav','newcatone_id'];

    public function newcatone()
    {
        return $this->belongsTo(Newcatone::class);
    }


    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Newcattwo::class);
    }
}