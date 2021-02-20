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

        $references = DB::table('plant_referencepages')
            ->leftJoin('categories', 'plant_referencepages.plant_categoryid', '=', 'categories.product_categoryid')->where('plant_referencepages.isDeleted',FALSE)->get();

        return view('admin.plantreference.index', ['references' => $references]);
    }


    public function create()
    {
        $categories =Categorie::latest()->where('isDeleted',FALSE)->get();
        return view('admin.plantreference.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {



        request()->validate([
            'plant_scientificname' => ['required'],
            'plant_description' => ['required'],
            'plant_maintenance' => ['required'],
            'plant_categoryid' => ['required'],
            'plant_photo' => ['required']
        ]);


        $ref = new Plant_referencepage();
        $ref->plant_scientificname = request('plant_scientificname');
        $ref->plant_description = request('plant_description');
        $ref->plant_maintenance = request('plant_maintenance');
        $ref->plant_categoryid = request('plant_categoryid');
        $ref->isDeleted = FALSE;

        if ($request->hasFile('plant_photo')) {
            $ref->plant_photo = request('plant_photo')->store('referecnce_page', 'public');
        }
        if ($request->hasFile('plant_phototwo')) {
            $ref->plant_phototwo = request('plant_phototwo')->store('referecnce_page', 'public');
        }
        if ($request->hasFile('plant_photothree')) {
            $ref->plant_photothree = request('plant_photothree')->store('referecnce_page', 'public');
        }
        $ref->save();

        return redirect('/admin/plantreference')->with('success', 'created reference ' .  request('plant_scientificname'));
    }



    public function show($id)
    {
    }


    public function edit($id, Request $request)
    {
        $reference = Plant_referencepage::findOrFail($id);

        $categories = Categorie::latest()->get();
        return view('admin.plantreference.edit', ['categories' => $categories, 'reference' => $reference]);
    }
    public function update($id)
    {
        request()->validate([
            'plant_scientificname' => ['required'],
            'plant_description' => ['required'],
            'plant_maintenance' => ['required'],


        ]);
        $ref = Plant_referencepage::find($id);
        $ref->plant_scientificname = request('plant_scientificname');
        $ref->plant_description = request('plant_description');
        $ref->plant_maintenance = request('plant_maintenance');
        $ref->plant_categoryid = request('plant_categoryid');

        if (request()->hasFile('plant_photo')) {
            $ref->plant_photo = request('plant_photo')->store('referecnce_page', 'public');
        }
        if (request()->hasFile('plant_phototwo')) {
            $ref->plant_phototwo = request('plant_phototwo')->store('referecnce_page', 'public');
        }
        if (request()->hasFile('plant_photothree')) {
            $ref->plant_photothree = request('plant_photothree')->store('referecnce_page', 'public');
        }
        $ref->save();

        return redirect('/admin/plantreference/' . $id)->with('success', 'Edited the reference page.');
    }

    public function removepic($id, $num)
    {

        $ref = Plant_referencepage::findOrFail($id);
        if (request('num') == 'two') {
            $ref->plant_phototwo = null;
        }

        if (request('num') == 'three') {
            $ref->plant_photothree = null;
        }
        $ref->save();

        return redirect('/admin/plantreference/' . $id)->with('success', 'Successfully removed a picture.');
    }




    public function destroy($id)
    {
        $set=Plant_referencepage::findOrFail($id);
        $set->isDeleted = TRUE;
        $set->save();

        return redirect('/admin/plantreference/')->with('success', ' removed ID [' .$set->plant_referenceid . '] ' . $set->plant_scientificname);
    }
}
