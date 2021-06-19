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
        return redirect()->route('categories.index')->with('success', 'created new category ' . $categorie->product_categoryid. ' '. $categorie->categories );
    }


    public function update(Categorie  $category)
    {
        $temp = $category->categories;
        $category->categories = request('categorieedit');
        $category->save();
        return redirect()->route('categories.index')->with('success', 'successfully edit catergory ' . $category->product_categoryid . '. ' . $temp . ' to ' . request('categorieedit'));
    }

    public function destroy(Categorie  $category)
    {
        $category->isDeleted = TRUE;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Removed catergory ' . $category->product_categoryid . '. ' . $category->categories);
    }
}
