<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;


    public function retailer(){
        $this->belongsTo(Prescription::class, 'retailer_id');
    }
}
