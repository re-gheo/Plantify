<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;

    protected $primaryKey ='retailer_id';
   


    public function store(){
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function product(){
        return $this->hasMany(Product::class, 'retailer_id');
    }
    public function subscription(){
        // dump($this->hasOne(Subscription::class, 'retailer_id'));
        return $this->hasOne(Subscription::class, 'retailer_id');
    }
    public function invoice(){
       
        return $this->hasOne(Invoice::class, 'retailer_id');
    }
}
