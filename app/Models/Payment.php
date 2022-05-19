<?php

namespace App\Models;

use App\Models\BaseModel;

class Payment extends BaseModel
{
    protected $fillable = ['id','stt','order_code','status','name','email','phone','address','province','district','ward','name_2','phone_2','address_2','province_2','district_2','ward_2','company','tax_code','address_vat','note_vat','transport','payment','cart','note','total'];
}
