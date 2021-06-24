<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned_keywords extends Model
{
    protected $primaryKey = 'assigned_keywordid';
    use HasFactory;

    // public function ratings()
    // {
    //     return $this->hasMany(ProductRating::class, 'product_id')->latest();
    // }

     public function keyword()
    {
        return $this->hasOne(Keyword::class,'keyword_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->latest();
    }
}
