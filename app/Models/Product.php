<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    public function inquiry(){
        return $this->hasMany(Inquiry::class, 'product_id');
    }

    public function retailer(){
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }

    public function commission(){
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function getCommissionEarnedAttribute(){
        return number_format((double)$this->commission->commissions_max_percentage * $this->product_price, 2, '.', ',') ;
    }

    public function getPriceAttribute(){
        return number_format((double)$this->product_price, 2, '.', ',');
    }


}

