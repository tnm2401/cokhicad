<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Feeship extends BaseModel
{
	// protected $table = 'About';
    protected $fillable = ['id','province_id','district_id','ward_id','fee_ship','hide_show'];

    public function Province()
    {
    	return $this->belongsTo('Province','province_id');
    }
    public function District()
    {
    	return $this->belongsTo('District','district_id');
    }
    public function Ward()
    {
    	return $this->belongsTo('Ward','ward_id');
    }
}
