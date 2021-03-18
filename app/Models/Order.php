<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey ='order_id';

    public function details(){
        return $this->hasOne(Order::class, 'order_customerid');
    }

    public function shipping(){
        return $this->hasOne(Order::class, 'order_customerid');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class, 'order_statusid');
    }

    public function paymentType(){
        return $this->belongsTo(PaymentType::class, 'payment_type');
    }

}
