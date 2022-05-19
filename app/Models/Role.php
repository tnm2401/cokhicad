<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Role extends BaseModel
{
    protected $fillable = ['id','slug','name','permissions','description','created_by','updated_by'];

    public function user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
}
