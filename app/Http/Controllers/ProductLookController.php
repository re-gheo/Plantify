<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductLookController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::latest()->search('product_name', $request->input('query'))->where('isDeleted', FALSE)->get();
        $categories = Categorie::select('product_categoryid', 'categories')->get();
        $keys = Keyword::all();
        return view('customer.find.search', compact('products', 'categories', 'keys'));
    }

    public function searchFilter(Request $request)
    {
        // dd(request()->all());
        $min = $request->input('min') ?? 0;
        $max = $request->input('max') ?? 9999999;
        $products = [];




        $productwith =  Product::latest()
            ->whereBetween('product_price', [$min, $max])
            ->with('assigned_keywords', 'assigned_keywords.keyword')
            ->search('product_name', $request->input('query'))
            ->where('isDeleted', FALSE);


        if ($request->input('category')) {
            $productwith =  $productwith->where('product_categoryid', $request->input('category'));
        }

        $productwith = $productwith->get();

        if ($request->input('keywords')) {


            foreach ($productwith as $pw) {
                $element = [];
                foreach ($pw->assigned_keywords as $ak) {

                    // dump($ak->owned_keywordid);
                    $element[] = $ak->owned_keywordid;
                }

                //    dump( array_diff($element,$request->input('keywords'))== null);
                if (array_diff($element, $request->input('keywords')) == null) {
                    $products[] = $pw;
                }
            }
        }
        $categories = Categorie::select('product_categoryid', 'categories')->get();
        $keys = Keyword::all();
        return view('customer.find.search', compact('products', 'categories', 'keys'));
    }

    public function categoryFilter($id)
    {
        $category = Categorie::find($id);
        $categories = Categorie::select('product_categoryid', 'categories')->get();
        $products =  Product::latest()->where('product_categoryid', $id)->get();
        // dd($product);
        return view('customer.find.category', compact('products', 'categories', 'category'));
    }


    public function ReFilter($id)
    {
        $category = Categorie::find($id);
        $categories = Categorie::select('product_categoryid', 'categories')->get();
        $products =  Product::latest()->where('product_categoryid', $id)->get();
        // dd($product);
        return view('customer.find.category', compact('products', 'categories', 'category'));
    }
}
