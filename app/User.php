<?php

namespace App;

use App\Notifications\OTPNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','isVerified',
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


    public function OTP(){
        return Cache::get($this->OTPKey());
    }

    public function OTPKey(){
        return "OTP_for_{$this->id}";
    }

    public function cacheTheOTP(){
        $OTP = rand(100000, 999999);
        Cache::put([$this->OTPKey() => $OTP], now()->addSeconds(60));
        return $OTP;
    }

    public function sendOTP($via){
        $OTP = $this->cacheTheOTP();
        $this->notify(new OTPNotification($via, $OTP));

    }


}










































//        // ASCII to base32
//        $secret = Greymich\TOTP\TOTP::base32Encode("12345678901234567890");
//        // Random
//        $secret = Greymich\TOTP\TOTP::genSecret(32);
//        // Initiate totp instance by secret
//        $otp = new Greymich\TOTP\TOTP($secret);
