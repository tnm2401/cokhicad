<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $table = 'post_tag';
    protected $fillable = ['tag_id','product_id'];
    public $timestamps = false;
    protected $guarded = [];

    // public function language(){
    //     return $this->belongsTo(Language::class,'locale','value');
    // }
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
