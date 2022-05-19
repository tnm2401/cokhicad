<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Ward extends BaseModel
{
    protected $fillable = ['id','name','name_en','district_id'];

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }
}
