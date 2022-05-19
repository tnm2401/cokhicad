<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerificationEmail;
use App\Notifications\ForgotPasswordEmail;
class Account extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'stt', 'email', 'password','phone','address','token','status','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the user a verification email
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function sendVerificationEmail()
    {
        $this->notify(new VerificationEmail($this));
    }
    /**
     * Send email forgot password with token
     * @param string $token
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function sendForgotPasswordEmail(string $token)
    {
        $this->notify(new ForgotPasswordEmail($this, $token));
    }
}
