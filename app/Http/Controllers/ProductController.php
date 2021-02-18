<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Plant_referencepage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    //CUSTOMER
    public function show($id)
    {
        $product = Product::join('plant_referencepages', 'products.product_referenceid' , '=' , 'plant_referencepages.product_referenceid ')->findOrFail($id);
        return view('retailer.products.list', ['product' => $product]);
    }


    // public function addtocart()
    // {
        
    // }

   // RETAILER
    public function list()
    {
        $products = Product::latest()->where('retailer_id', Auth::user()->id);
        
        return view('retailer.products.list', ['products' => $products]);
    }


    public function create()
    {
        $refs = Plant_referencepage::latest();
        return view('retailer.products.create', ['refs' => $refs]);
    }
    public function store()
    {
        $product = new Product();
        $product->product_name = request('product_name');
        $product->product_description = request('product_description');
        $product->product_sizes = request('product_sizes');
        $product->product_varieties = request('product_varieties');
        // $product->product_photo = request('product_photo');
        // $product->product_phototwo = request('product_phototwo');
        // $product->product_photothree = request('product_photothree');
        // $product->product_photofour = request('product_photofour');
        $product->product_referenceid = request('product_referenceid');
        // $product->product_categoryid = request('product_categoryid');
        $product->product_price = request('product_price');
        $product->product_quantity = request('product_quantity');
        // $product->product_keywordid = request('product_keywordid');
        //$product->product_commentid = request('product_commentid');
        $product->retailer_id = Auth::user()->id;
        $product->save();

        return redirect('/store/products/'. $product->product_id);

       
        
    }

   
    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function remove()
    {
        
    }

   



    
  
}
