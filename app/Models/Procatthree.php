<?php

namespace App\Models;
use App\Models\BaseModel;
class Procatthree extends BaseModel

{

    public function procattwo()
    {
        return $this->belongsTo(Procattwo::class);
    }
    public function procatone()
    {
        return $this->belongsTo(Procatone::class);
    }


    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
{
return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Procatthree::class);
}
}
