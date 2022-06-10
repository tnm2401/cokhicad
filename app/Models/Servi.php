<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Servi extends BaseModel
{
    protected $fillable = ['id','stt','svcategory_id','view_count','is_new','is_featured','hide_show','img','video','video_code'];
    public function svcate () {
        return $this->belongsTo(Svcategory::class,'svcategory_id');
    }

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Servi::class);
    }
}