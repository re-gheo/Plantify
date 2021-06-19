<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index()
    {

       $keyword = Keyword::orderBy('keyword_id', 'desc')->where('isDeleted',FALSE)->get();
       
        return view('admin.keywords.index', ['keywords' =>$keyword]);
    }


    public function store()
    {
        
        request()->validate([
            'keywords' => 'required',
        ]);

       $keyword = new Keyword();
       $keyword->keyword_name = request('keywords');
       $keyword->isDeleted = FALSE;
       $keyword->save();
       return redirect()->route('keyword.index')->with('success', 'created new keyword ' .$keyword->product_categoryid. ' '.$keyword->keyword_name );
    }


    public function update($id)
    {

        request()->validate([
            'keywordedit' => 'required',
        ]);
       $keyword = Keyword::find($id);
        $temp =$keyword->keyword_name;
       $keyword->keyword_name = request('keywordedit');
       $keyword->save();
       return redirect()->route('keyword.index')->with('success', 'successfully edit keyword ' . $id . '. ' . $temp . ' to ' . request('keywordedit'));
    }

    public function destroy($id)
    {
        $set = Keyword::find($id);
        $set->isDeleted = TRUE;
        $set->save();
       return redirect()->route('keyword.index')->with('success', 'Removed keyword ' . $id . '. ' . $set->keyword_name);
    }
}
