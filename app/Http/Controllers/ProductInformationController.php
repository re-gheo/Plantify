<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Plant_referencepage;

class ProductInformationController extends Controller
{
    
    public function index()
    {


        
        
      

        $plant_referencepages = Plant_referencepage::all();
        $categories = Categorie::all();
        return view('customer.plantreference.index', compact('plant_referencepages', 'categories'));
    }

  
    // public function create()
    // {
    //     //
    // }

   
    // public function store(Request $request)
    // {
    //     //
    // }

    
    public function show(Plant_referencepage $plant_referencepage)
    {
        $plant_referencepage = Plant_referencepage::with('products', 'products.retailer')->find($plant_referencepage->plant_referenceid);
        // dd( $plant_reference );
        $storeIdList = [];
        foreach ($plant_referencepage->products as $product) {
            $storeIdList[] = $product->retailer->retailer_id;
        }
       
        $retailer = Retailer::find($storeIdList);

        return view('customer.plantreference.show', compact('plant_referencepage', 'retailer'));
    }

    
    public function edit(Plant_referencepage $plant_referencepage)
    {
        
    }

    
    public function update(Request $request, Plant_referencepage $plant_referencepage)
    {
        //
    }

    
    public function destroy(Plant_referencepage $plant_referencepage)
    {
        //
    }
}
