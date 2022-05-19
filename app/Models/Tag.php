<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\BaseModel;

class Tag extends BaseModel

{

    public function translations(){
        // return $this->hasMany(TagTranslation::class)->whereIn('locale', Language::pluck('locale')->toArray());
        return $this->hasOne(TagTranslation::class,'tag_id')->whereLocale(session('locale'));

    }
    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Tag::class);
    }

    public function tag_product(){
        return $this->hasMany(ProductTag::class,'tag_id');
    }


    public function tag_post(){
        return $this->hasMany(PostTag::class,'tag_id');
    }

}
