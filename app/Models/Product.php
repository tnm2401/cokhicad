<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
class Product extends BaseModel
{
    protected $fillable = ['id','type','hide_show','product_code','stt','is_featured','is_new','user_id','img','price','selling_price','discount','procatone_id','procattwo_id','procatthree_id','tags'];


    public function images()
    {
        return $this->hasMany(Productsimage::class);
    }

    public function procatone () {
        return $this->belongsTo(Procatone::class);
    }
    public function procattwo () {
        return $this->belongsTo(Procattwo::class);
    }
    public function procatthree () {
        return $this->belongsTo(Procatthree::class);
    }

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Product::class);
    }

    public function get_tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function get_tags_product(){
        return $this->HasMany(ProductTag::class,'product_id');
    }

}
