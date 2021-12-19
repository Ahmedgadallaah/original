<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use App\Car;
use App\DealerRating;

class User extends \TCG\Voyager\Models\User implements Wallet

{

    use HasFactory, Notifiable , HasWallet,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'lat',
        'lng',
        'avatar',
        'address',
        'location',
        'point',
        'type',
        'valid_to',
        'role_id',
        'approve',
        'provider',
        'provider_id',
        'phone_verified',
        'trusted',
        'login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'provider_id'
    ];

    protected  $apppends = ['total_rate'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cars () {
        return $this->belongsToMany(Car::class ,'car_users');
    }


    public function getTotalRateAttribute(){

        $rate = DealerRating::where('dealer_id' , $this->id)->avg('rate');
        if(!$rate) {
            return 0;
        }

        return $rate;
    }
}
