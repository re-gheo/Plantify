<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'product_id';
    protected $appends = [
        'is_verified'
    ];

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class, 'product_id');
    }

    public function getIsVerifiedAttribute()
    {
        return ($this->verified)? "Verified" : "Not Verified";
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class, 'retailer_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }

    public function getCommissionEarnedAttribute()
    {
        return number_format((float)$this->commission->commissions_max_percentage * $this->product_price, 2, '.', ',');
    }

    public function getPriceAttribute()
    {
        return number_format((float)$this->product_price, 2, '.', ',');
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class, 'product_id')->latest();
    }

    public function filterForPlant_Reference()
    {return $this;
        if(true){

        }
    }
    public function assigned_keywords()
    {
        return $this->hasMany(Assigned_keywords::class, 'product_id');
    }


    public function getratingAverageAttribute()
    {
        $ratings = $this->ratings;


        if ($ratings->isEmpty()) {
            return 0;
        } else {
            $positive = 0;
            $negative = 0;

            foreach ($ratings as $feedback) {
                if ($feedback->rating) {
                    $positive++;
                } else {
                    $negative++;
                }
            }

            $derived_rating = ($positive / ($positive + $negative)) * 100;
            $final = round($derived_rating / 10);

            return $final;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('verified', 1);
    }
}
