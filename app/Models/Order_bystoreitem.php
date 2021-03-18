<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_bystoreitem extends Model
{
    use HasFactory;
    protected $primaryKey ='order_bystoreitem_id';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function retailer(){
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }
}
