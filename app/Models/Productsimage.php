<?php

namespace App\Models;
use App\Models\BaseModel;
class Productsimage extends BaseModel
{
    protected $fillable = ['id','product_id','imgs','type'];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }
}
