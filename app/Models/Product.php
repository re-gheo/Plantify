<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    public function keywords(){
        return $this->belongsToMany(Keyword::class, 'assigned_keywords','owned_keywordid');
    }
}
