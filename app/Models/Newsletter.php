<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Newsletter extends BaseModel
{    use HasFactory;

    protected $fillable = ['id','stt','email','read','note'];



    public function account()
    {
    	return $this->belongsTo(Account::class);
    }

}
