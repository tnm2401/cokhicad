<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends BaseModel
{
    protected $fillable = ['id','view_count','stt','hide_show','is_new','is_featured','quantity','date_expired','img'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Recruitment::class);
    }

}
