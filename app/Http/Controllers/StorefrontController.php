<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Assigned_photos;
use App\Models\Assigned_keywords;
use App\Models\Plant_referencepage;
use Illuminate\Support\Facades\Auth;

class StorefrontController extends Controller
{
    public function front()
    {
        $products = Product::latest()->get()->where('isDeleted', FALSE);
        
        return view('storefront', ['products' => $products]);
    }

    public function show()
    {
        $product = Product::join('plant_referencepages', 'products.product_referenceid' , '=' , 'plant_referencepages.plant_referenceid')->findOrFail($id);
        $askeys = Assigned_keywords::latest()->where('product_id', '=' ,$product->product_id )->get();
        $asphotos = Assigned_photos::latest()->where('product_id', '=' ,$product->product_id )->get();
       
       return view('storefront', ['product' => $product, '$askeys' => $askeys, 'asphotos'=> $asphotos] );
    }
}
