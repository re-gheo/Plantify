<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $primaryKey ='orderdetails_id';

    public function order(){
        return $this->hasOne(Order::class);
    }
}
