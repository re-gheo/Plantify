<?php

namespace App\Http\Controllers;

use App\Models\ProductRating;
use Illuminate\Http\Request;

use Auth;

class ProductRatingController extends Controller
{
    public function rate($id, Request $request){
        ProductRating::create([
            'product_id' => $id,
            'user_id' => Auth::id(),
            'rating' => $request->ratingType,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }
}
