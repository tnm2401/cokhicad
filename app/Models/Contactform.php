<?php

namespace App\Models;
use App\Models\BaseModel;

class Contactform extends BaseModel
{
    protected $fillable = ['id','type','stt','name','address','phone','email','subject','contactcontent','note','read'];
}
