<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Online extends BaseModel
{
	protected $table = 'onlines';
    protected $fillable = ['id','session_id'];
}
