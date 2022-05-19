<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Video extends BaseModel
{
    protected $fillable = ['id','img','url_code','link','stt','is_featured','hide_show','status','videocat_id'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Video::class);
    }
}
