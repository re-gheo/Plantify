<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function results(Request $request){
        $keywords = [];
        $keys = [];

       foreach($request->keywords as $id){
           $key = Keyword::find($id);
           array_push($keywords, $key->keyword_name);
           array_push($keys, $key);
       }

       return view('search.result', compact('keywords', 'keys'));
   }
}
