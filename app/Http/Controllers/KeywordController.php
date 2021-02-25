<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {

       $keyword = Keyword::latest()->where('isDeleted',FALSE)->get();
        return view('admin.category.index', ['keywords' =>$keyword]);
    }


    public function store()
    {
        request()->validate([
            'keywords' => 'required',
        ]);

       $keyword = new Keyword();
       $keyword->keywords = request('keywords');
       $keyword->isDeleted = FALSE;
       $keyword->save();
        return redirect('/admin/keyword')->with('success', 'created new category ' .$keyword->product_categoryid. ' '.$keyword->keywords );
    }


    public function update($id)
    {
       $keyword = Keyword::find($id);
        $temp =$keyword->keywords;
       $keyword->keywords = request('keywordedit');
       $keyword->save();
        return redirect('/admin/keyword')->with('success', 'successfully edit catergory ' . $id . '. ' . $temp . ' to ' . request('categorieedit'));
    }

    public function destroy($id)
    {
        $set = Keyword::find($id);
        $set->isDeleted = TRUE;
        $set->save();
        return redirect('/admin/keyword')->with('success', 'Removed catergory ' . $id . '. ' . $set->keywords);
    }
}
