<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $fillable = ['id','type','view_count','stt','is_new','is_featured','hide_show','img','newcatone_id','newcattwo_id'];


    public function newcatone () {
        return $this->belongsTo(Newcatone::class);
    }
    public function newcattwo () {
        return $this->belongsTo(Newcattwo::class);
    }

    public function translations()
    {
        return $this->morphOne(Translation::class,'trans')->whereLocale(session('locale'));
    }

    public function delete_trans()
    {
    return $this->hasMany(Translation::class,'trans_id')->whereTrans_type(Post::class);
    }


    public function get_tags(){
        return $this->belongsToMany(Tag::class);
    }
}
