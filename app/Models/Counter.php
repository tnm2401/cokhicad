<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Counter extends BaseModel
{
	protected $table = 'counters';
    protected $fillable = ['id','time','ip'];
}
