<?php

namespace App\Models;

use App\Models\BaseModel;

class Orderdetail extends BaseModel
{
    protected $fillable = ['order_id','product_id','price','quantity'];

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
