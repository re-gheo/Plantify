<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plant_referencepage;

class PlantReferencepageController extends Controller
{
   
    public function index()
    {
    //    dd( $joints = DB::table('plant_referencepages')
    //         ->leftJoin('categories', 'plant_referencepages.plant_categoryid' , '=' , 'categories.product_categoryid') ->get()
    //     );
    //     dd( $Plant_reference = Plant_referencepage::latest()->get() );
    //     $Plant_reference = Plant_referencepage::latest()->get();   

    $references = DB::table('plant_referencepages')
    ->leftJoin('categories', 'plant_referencepages.plant_categoryid' , '=' , 'categories.product_categoryid') ->get();
    
        return view('admin.plantreference.index',['references' => $references]);  
    }

    
    public function create()
    {
        $categories = Categorie::latest()->get(); 
        return view('admin.plantreference.create',['categories' => $categories]); 
    }

   
    public function store(Request $request)
    {
       // dd($request->all());
       //dd($request->plant_photo->store('referecnce_page','public'));
    //    if($request->hasFile('plant_photo')){
    //     dd(request('plant_photo')->store('referecnce_page','public'));
    //    }
    //    else{
    //        dd('FALSE');
    //    }
      

       request()->validate([
           'plant_scientificname'=>['required'],
           'plant_description'=>['required'],
           'plant_maintenance'=>['required'],
           'plant_categoryid'=>['required'],
           'plant_photo' =>['required']
        ]);


        $ref = new Plant_referencepage();
            $ref->plant_scientificname = request('plant_scientificname');
            $ref->plant_description = request('plant_description');
            $ref->plant_maintenance = request('plant_maintenance');
            $ref->plant_categoryid = request('plant_categoryid');

            if($request->hasFile('plant_photo')){
                $ref->plant_photo = request('plant_photo')->store('referecnce_page','public');
            }
            if($request->hasFile('plant_phototwo')){
                $ref->plant_phototwo = request('plant_phototwo')->store('referecnce_page','public');
            } 
            if($request->hasFile('plant_photothree')){
                $ref->plant_photothree = request('plant_photothree')->store('referecnce_page','public');
            }
            $ref->save();
            
            return redirect('/admin/plantreference');

    }


   
    public function show($id)
    {
        
    }

   
    public function edit($id, Request $request)
    {
        $reference = Plant_referencepage::findOrFail($id);

        $categories = Categorie::latest()->get(); 
        return view('admin.plantreference.edit',['categories' => $categories, 'reference' =>$reference]); 
    }
    public function update($id)
    {
        request()->validate([
            'plant_scientificname'=>['required'],
            'plant_description'=>['required'],
            'plant_maintenance'=>['required'],
           
           
         ]);
         $ref = Plant_referencepage::find($id);
             $ref->plant_scientificname = request('plant_scientificname');
             $ref->plant_description = request('plant_description');
             $ref->plant_maintenance = request('plant_maintenance');
             $ref->plant_categoryid = request('plant_categoryid');
 
             if(request()->hasFile('plant_photo')){
                 $ref->plant_photo = request('plant_photo')->store('referecnce_page','public');
             }
             if(request()->hasFile('plant_phototwo')){
                 $ref->plant_phototwo = request('plant_photo')->store('referecnce_page','public');
             } 
             if(request()->hasFile('plant_photothree')){
                 $ref->plant_photothree = request('plant_photo')->store('referecnce_page','public');
             }
             $ref->save();
             
             return redirect('/admin/plantreference/'. $id);
 
    }

  
    public function destroy($id)
    {
        Plant_referencepage::findOrFail($id)->delete();
 
        return redirect ('/admin/plantreference/');
    }
}
