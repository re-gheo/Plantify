<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ratee(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getratingTypeAttribute(){
        $type="";

        switch($this->rating){
            case true:
                $type = "Positive";
                break;
            case false:
                $type= "Negative";
                break;
        }

        return $type;
    }
}
