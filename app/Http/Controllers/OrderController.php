<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart_item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    


    public function addtocheckout(Request $request)
    { 
       $items = Cart_item::find(json_decode(request()->hidid));
      
    }

    
    public function create()
    {
        //
    }

    
    
    public function store(Request $request)
    {
        //
    }

   
    public function show(Order $order)
    {
        //
    }

    
    public function edit(Order $order)
    {
        //
    }

    
    public function update(Request $request, Order $order)
    {
        //
    }

   
    public function destroy(Order $order)
    {
        //
    }
}
