<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Retailer_application;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'user_stateid',
        'email',
        'password',
        'user_role',
        'password',
        'remarks'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store(){
        return $this->has(Store::class);
    }

    public function retailer_application(){
        return $this->hasmany(Retailer_application::class);
    }

    public function getGovIDAttribute(){
        return json_decode($this->govtid_number);
    }

    public function getProfilePictureAttribute(){
        return ($this->avatar)? $this->avatar : asset('/css/default-image.svg');
    }

    public function orderDetails(){
        return $this->hasMany(Order_detail::class);
    }
}
