<?php

namespace App\Models;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends BaseModel
{
    // protected $fillable = ['id','type_model','id_model','name','title','keywords','description','descriptions','slug','locale'];
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;


    public function trans()
    {
        return $this->morphTo();
    }

    public function procateone(){
        return $this->belongsTo(Procatone::class);
    }
}
