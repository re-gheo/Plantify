<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Assigned_photos;
use App\Models\Assigned_keywords;
use App\Models\Plant_referencepage;
use Illuminate\Support\Facades\Auth;

class StorefrontController extends Controller
{
    public function front()
    {
        $categories = Categorie::all();
        $products = Product::latest()->where('isDeleted', FALSE)->active()->get();
        

        if(Auth::user()){
            $products = Product::latest()->where('isDeleted', FALSE)->where("retailer_id","!=", Auth::user()->id )->active()->get();
        }
        return view('storefront', compact('categories', 'products'));
    }

    public function show($id)
    {
        $categories = Categorie::all();
        $product = Product::active()->join('plant_referencepages', 'products.product_referenceid', '=', 'plant_referencepages.plant_referenceid')->findOrFail($id);
        $askeys = Assigned_keywords::latest()->where('product_id', '=', $product->product_id)->get();
        $asphotos = Assigned_photos::latest()->where('product_id', '=', $product->product_id)->get();

        return view('storefront', compact('categories', 'product', '$askeys', 'asphotos'));
    }
}
