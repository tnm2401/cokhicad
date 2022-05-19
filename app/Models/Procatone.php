<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\BaseModel;

class Procatone extends BaseModel

{
    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Procatone::class);
    }

    public function parent()
    {
        return $this->belongsTo(Procatone::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function procat2()
    {
        return $this->hasMany(Procattwo::class);
    }


    // public function getid(){
    //     return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));

    // }
}
