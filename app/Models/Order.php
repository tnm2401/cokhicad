<?php

namespace App\Models;

use App\Models\BaseModel;

class Order extends BaseModel
{
    // protected $fillable = ['order_id','stt','status','name','email','phone','address','note','province','district','ward','total','order_date','order_note','total','account_id'];

    protected $dates = ['from_date','to_date'];


    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class);
    }
    public function account()
    {
    	return $this->belongsTo(Account::class);
    }
    public function orderstatus()
    {
        return $this->belongsTo(Status_order::class,'status');
    }

}
