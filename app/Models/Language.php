<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Language extends BaseModel
{
    protected $fillable = ['id','locale','name','flag'];

}
