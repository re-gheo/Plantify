<?php

namespace App\Models;

use App\Models\User;
use App\Models\Retailer_application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

     protected $primaryKey ='store_id';

     public function products(){
        return $this->hasManyThrough(Product::class,Retailer::class,'store_id','retailer_id');
    }



    public function user(){
        return $this->has(User::class);
    }

    // public function retailer_application(){
    //     return $this->hasmany(Retailer_application::class);
    // } 
}
