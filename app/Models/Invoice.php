<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function plan_type(){
        switch ($this->plan_id) {
            case 1:
               return "1 Month Plan";
                break;
            case 2:
               return "3 Month Plan";

                break;
            case 3:
                return "6 Month Plan";

                break;
        }
    }
}
