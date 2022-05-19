<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Hideshow extends BaseModel
{
    protected $fillable = ['id','name','type','status'];

}
