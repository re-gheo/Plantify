<?php

namespace App\Http\Controllers;

use App\Mail\ReviewPosted;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\User;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Mail;

class ProductRatingController extends Controller
{
    public function rate($id, Request $request){
        ProductRating::create([
            'product_id' => $id,
            'user_id' => Auth::id(),
            'rating' => $request->ratingType,
            'comment' => $request->comment,
        ]);

        $product = Product::find($id);

        Mail::to(User::find($product->retailer->store->store_id))->send(new ReviewPosted($product));

        return redirect()->back();
    }
}
