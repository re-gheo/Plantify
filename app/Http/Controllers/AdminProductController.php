<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Session;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', ['products' => $products]);
    }

    //@TODO Validate Request, Put Middleware
    public function validateProduct($id){
        Product::findOrFail($id)->update([
            'verified' => 1,
        ]);

        Session::flash('success', 'Succesfully Validate Product');
        return redirect()->back();
    }

    public function invalidateProduct($id){
        Product::findOrFail($id)->update([
            'verified' => 0,
        ]);

        Session::flash('success', 'Succesfully Invalidated Product');
        return redirect()->back();
    }

}
