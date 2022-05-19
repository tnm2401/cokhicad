<?php

namespace App\Models;
use App\Models\BaseModel;

class Contact extends BaseModel
{
    protected $fillable = ['id','type','view_count','hide_show','name_vi','name_en','name_cn','descriptions_vi','descriptions_en','descriptions_cn','content_vi','content_en','content_cn','title_vi','title_en','title_cn','keywords_vi','keywords_en','keywords_cn','description_vi','description_en','description_cn','img'];
}
