<?php

namespace App\Models;

use App\Models\BaseModel;

class Procattwo extends BaseModel

{
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
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Procattwo::class);
    }
}