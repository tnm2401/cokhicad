<?php

namespace App\Models;

use App\Models\BaseModel;

class Page extends BaseModel
{
    protected $fillable = ['id','type','img','hide_show','published'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
        return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Page::class);
    }
}
