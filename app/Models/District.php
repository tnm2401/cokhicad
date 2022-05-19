<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class District extends BaseModel
{
    protected $fillable = ['id','name','name_en','province_id'];

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
    public function wards()
    {
        return $this->hasMany('App\Models\Ward');
    }
}
