<?php

namespace App\Models;
use App\Models\BaseModel;

class Author extends BaseModel
{
    protected $fillable = ['id','type','view_count','hide_show','name_vi','name_en','name_cn','content_vi','content_en','content_cn','img','link_group','link_author','namebuttonone','namebuttontwo','published'];
}
