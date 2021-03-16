<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {

        $categorie = Categorie::latest()->where('isDeleted',FALSE)->get();
        return view('admin.category.index', ['categories' => $categorie]);
    }


    public function store()
    {
        request()->validate([
            'categories' => 'required',
        ]);

        $categorie = new Categorie();
        $categorie->categories = request('categories');
        $categorie->isDeleted = FALSE;
        $categorie->save();
        return redirect()->route('admin.category.get')->with('success', 'created new category ' . $categorie->product_categoryid. ' '. $categorie->categories );
    }


    public function update($id)
    {
        $categorie = Categorie::find($id);
        $temp = $categorie->categories;
        $categorie->categories = request('categorieedit');
        $categorie->save();
        return redirect()->route('admin.category.get')->with('success', 'successfully edit catergory ' . $id . '. ' . $temp . ' to ' . request('categorieedit'));
    }

    public function destroy($id)
    {
        $set = Categorie::find($id);
        $set->isDeleted = TRUE;
        $set->save();
        return redirect()->route('admin.category.get')->with('success', 'Removed catergory ' . $id . '. ' . $set->categories);
    }
}
