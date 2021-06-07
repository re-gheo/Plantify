<?php

namespace App\Models;

use App\Models\User;
use App\Models\Retailer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Retailer_application extends Model
{
    use HasFactory;

    protected $primaryKey = 'retailer_applicationid';

    public function retailer(){
        return $this->belongsTo(Retailer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
