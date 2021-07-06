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
}
