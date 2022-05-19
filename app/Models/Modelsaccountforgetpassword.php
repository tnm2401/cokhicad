<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelsaccountforgetpassword extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account_password_resets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // public $timestamps = false;

    protected $fillable = [
        'name', 'stt', 'email', 'password','phone','address','token','status','email_verified_at','remember_token'
    ];

    
}
