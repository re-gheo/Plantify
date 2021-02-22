<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Assigned_photos;
use App\Models\Assigned_keywords;
use App\Models\Plant_referencepage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //CUSTOMER
    public function show($id)
    {
        $product = Product::findOrFail($id);
        if ($product->isPlant == 1) {
            $product = Product::join('plant_referencepages', 'products.product_referenceid', '=', 'plant_referencepages.plant_referenceid')->findOrFail($id);
        }

        $askeys = Assigned_keywords::join('keywords', 'assigned_keywords.owned_keywordid', '=', 'keywords.keyword_id')->where('product_id', '=', $product->product_id)->get();

        $asphotos = Assigned_photos::latest()->where('product_id', '=', $product->product_id)->get();

        return view('retailer.products.show', ['product' => $product, 'askeys' => $askeys, 'asphotos' => $asphotos]);
    }

    public function showCustomer($id)
    {
        $product = Product::findOrFail($id);
        if ($product->isPlant == 1) {
            $product = Product::join('plant_referencepages', 'products.product_referenceid', '=', 'plant_referencepages.plant_referenceid')->findOrFail($id);
        }

        $askeys = Assigned_keywords::join('keywords', 'assigned_keywords.owned_keywordid', '=', 'keywords.keyword_id')->where('product_id', '=', $product->product_id)->get();

        $asphotos = Assigned_photos::latest()->where('product_id', '=', $product->product_id)->get();

        return view('customer.products.item', ['product' => $product, 'askeys' => $askeys, 'asphotos' => $asphotos]);
    }



    public function list()
    {
        $products = Product::latest()->where('retailer_id', Auth::user()->id)->where('isDeleted', FALSE)->get();

        return view('retailer.products.list', ['products' => $products]);
    }


    public function create($type)
    {
        if ($type == "plant") {
            $refs = Plant_referencepage::latest()->where('isDeleted', FALSE)->get();
            $keys = Keyword::all();

            return view('retailer.products.create', ['refs' => $refs, 'keys' => $keys]);
        } elseif ($type == "product") {
            $keys = Keyword::all();
            return view('retailer.products.ncreate', ['keys' => $keys]);
        }
    }


    public function store(Request $request)
    {

        $product = new Product();
        if (url()->previous() == "http://localhost:8000/store/products/create/plant") {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_sizes' => 'required',
                'product_mainphoto' => 'required',
                'product_referenceid' => 'required',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'keywords' => 'required|min:1'
            ]);
            $product->product_sizes = request('product_sizes');
            $product->product_referenceid = request('product_referenceid');
            $product->isPlant = 1;
        } elseif (url()->previous() == "http://localhost:8000/store/products/create/product") {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_mainphoto' => 'required',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'keywords' => 'required|min:1'
            ]);
            $product->isPlant = 0;
        }



        $product->product_name = request('product_name');
        $product->product_description = request('product_description');
        $product->product_mainphoto = request('product_mainphoto')->store('product_photo', 'public');
        $product->product_price = request('product_price');
        $product->product_quantity = request('product_quantity');
        $product->retailer_id = Auth::user()->id;
        $product->isDeleted = 0;
        $product->save();

        if ($request->hasFile('product_photo')) {
            $plist = $request->file('product_photo');
            foreach ($plist as $p) {
                $photo = new Assigned_photos();
                $photo->product_id =  $product->product_id;
                $photo->product_photo = $p->store('product_photo', 'public');
                $photo->save();
            }
        }

        $keys = $request->input('keywords');
        foreach ($keys as $key) {
            // if(!Assigned_keywords::where('owned_keywordid', '=', $key)->where()->exists()){
            $keyword = new Assigned_keywords();
            $keyword->owned_keywordid = $key;
            $keyword->product_id =  $product->product_id;
            $keyword->save();
            // }


        }
        return redirect('/store/products/' . $product->product_id);
    }


    public function edit($id)
    {
        $refs = Plant_referencepage::latest()->where('isDeleted', FALSE)->get();
        $keys = Keyword::all();

        $product = Product::findOrFail($id);
        if ($product->isPlant == 1) {
            $product = Product::join('plant_referencepages', 'products.product_referenceid', '=', 'plant_referencepages.plant_referenceid')->findOrFail($id);
        }
        $askeys = Assigned_keywords::join('keywords', 'assigned_keywords.owned_keywordid', '=', 'keywords.keyword_id')
            ->where('product_id', '=', $product->product_id)->get();
        $asphotos = Assigned_photos::latest()
            ->where('product_id', '=', $product->product_id)->get();

        return view('retailer.products.edit', ['refs' => $refs, 'keys' => $keys, 'product' => $product, 'askeys' => $askeys, 'asphotos' => $asphotos]);
    }

    public function update(Request $request, $id)
    {
        $product =  Product::findOrFail($id);

        if ($product->isPlant == 1) {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_sizes' => 'required',
                'product_referenceid' => 'required',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'keywords' => 'required|min:1'
            ]);
            $product->product_sizes = request('product_sizes');
            $product->product_referenceid = request('product_referenceid');
        }
        if ($product->isPlant == 0) {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'keywords' => 'required|min:1'
            ]);
            $product->isPlant = 0;
        }
        $product->product_name = request('product_name');
        $product->product_description = request('product_description');
        $product->product_sizes = request('product_sizes');
        if ($request->hasFile('product_mainphoto')) {
            $product->product_mainphoto = request('product_mainphoto')->store('product_photo', 'public');
        }

        $product->product_referenceid = request('product_referenceid');

        $product->product_price = request('product_price');
        $product->product_quantity = request('product_quantity');
        $product->retailer_id = Auth::user()->id;
        $product->isDeleted = 0;
        $product->save();


        if ($request->hasFile('product_photo')) {
            $plist = $request->file('product_photo');

            foreach ($plist as $p) {
                $photo = new Assigned_photos();
                $photo->product_id = $product->product_id;
                $photo->product_photo = $p->store('product_photo', 'public');
                $photo->save();
            }
        }
        Assigned_keywords::where('product_id', $product->product_id)->delete();
        $keys = $request->input('keywords');
        foreach ($keys as $key) {
            // if(!Assigned_keywords::where('owned_keywordid', '=', $key)->where()->exists()){
            $keyword = new Assigned_keywords();
            $keyword->owned_keywordid = $key;
            $keyword->product_id =  $product->product_id;
            $keyword->save();
            // }


        }


        return redirect('/store/products/' . $product->product_id);
    }

    public function remove(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->isDeleted = 1;
        $product->save();
        return redirect('/store/products/')->with('success', 'a product was deleted');
    }


    public function removepicture($id, $picid)
    {

        $asphotos = Assigned_photos::where('assigned_photoid', '=', $picid)->where('product_id', '=', $id)->delete();
        return redirect('/store/products/' . $id . '/edit');
    }
}
