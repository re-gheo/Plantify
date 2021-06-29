<?php

namespace App\Http\Controllers;

use App\Models\Plant_referencepage;
use Illuminate\Http\Request;

class ProductInformationController extends Controller
{
    
    public function index()
    {
        $plant_referencepages = Plant_referencepage::all();
        return view('customer.plantreference.index', compact('plant_referencepages'));
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
        
        return view('customer.plantreference.show', compact('plant_referencepage'));
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
