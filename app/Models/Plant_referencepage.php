<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant_referencepage extends Model
{
    use HasFactory;

    protected $primaryKey = 'plant_referenceid';

    public function products()
    {
        return $this->hasMany(Product::class, 'product_referenceid')->latest();
    }

}
