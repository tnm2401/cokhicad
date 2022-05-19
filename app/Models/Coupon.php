<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
	// protected $table = 'Coupon';
    protected $fillable = ['id','stt','type','name','coupon','condition','quantity','discount','expiry_date','effective_date','status'];


    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
        return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Coupon::class);
    }
}
