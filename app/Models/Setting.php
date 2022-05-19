<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Setting extends BaseModel
{
    protected $fillable = ['id','logoindex','header','img','favicon','instagram','facebook','twitter','youtube','whatsapp','viber','uidfbadmin','appidfb','codehead','codebody','idanalytics','googlesiteverification','latitude','longitude','email','website','web','hotline_1','hotline_2','hotline_3','href_1','href_2','href_3','lang','author','robots','maps','maps_1','published'];

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    // public function translations_update()
    // {
    //     return $this->morphMany(Translation::class,'trans');
    // }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Product::class);
    }

}


