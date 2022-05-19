<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Province extends BaseModel
{
    protected $fillable = ['id','name','name_en','type'];

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }
}
