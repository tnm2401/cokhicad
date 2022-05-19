<?php

namespace App\Models;

use App\Models\BaseModel;

class Newcatone extends BaseModel

{
    protected $fillable = ['id','img','stt','hide_show','show_nav'];
    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function delete_trans()
    {
        return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Newcatone::class);
    }
}
