<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\Cart_item;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Models\Shopping_cart;
use App\Models\Assigned_photos;
use App\Models\Assigned_keywords;
use App\Models\Plant_referencepage;
use App\Services\LogServices;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //CUSTOMER
    public function show($id)
    {

        // dd("hi");
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



    public function index()
    {
        $products = Product::latest()->where('retailer_id', Auth::user()->id)->where('isDeleted', FALSE)->get();

        return view('retailer.products.list', ['products' => $products]);
    }


    public function create($type)
    {
        if ($type == "plant") {
            $refs = Plant_referencepage::latest()->where('isDeleted', FALSE)->get();
            $keys = Keyword::all()->where('isDeleted', 0);

            return view('retailer.products.create', ['refs' => $refs, 'keys' => $keys]);
        } elseif ($type == "product") {
            $keys = Keyword::all()->where('isDeleted', 0);
            $com = Commission::all()->except(1);
            return view('retailer.products.ncreate', ['keys' => $keys, 'com' => $com]);
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
            $product->commission_id = 1;
        } elseif (url()->previous() == "http://localhost:8000/store/products/create/product") {

            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_mainphoto' => 'required',
                'product_price' => 'required',
                'commission_id' => 'required',
                'product_quantity' => 'required',
                'keywords' => 'required|min:1'
            ]);
            $product->isPlant = 0;
            $product->commission_id = request('commission_id');
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

        $log = 'Created Product ID: '.$product->id;
        LogServices::log($log);

        return redirect()->route('retailer.products.show', ['id'=>$product->product_id]);
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

        $log = 'Update Product ID: '.$product->id;
        LogServices::log($log);

        return redirect()->route('retailer.products.show', ['id'=>$product->product_id]);
    }

    public function remove(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->isDeleted = 1;
        $product->save();
        return redirect()->route('retailer.products.front')->with('success', 'a product was deleted');
    }





    public function removepicture($id, $picid)
    {

        $asphotos = Assigned_photos::where('assigned_photoid', '=', $picid)->where('product_id', '=', $id)->delete();
        return redirect()->route('retailer.products.show', ['id'=>$id]);
    }



    // Phase 2 - Add to cart
    public function getmycart()
    {

        // $cart = Cart_item::join('shopping_carts', 'cart_items.cart_id', '=', 'shopping_carts.cart_id')
        //     ->join('products', 'cart_items.product_id', '=', 'products.product_id')
        //     ->where('cart_items.user_id',  Auth::user()->id)->get();


        $disd = Shopping_cart::where('user_id',  Auth::user()->id)
            ->distinct()->get(['cartdate']);

        $discart = array();
        foreach ($disd as $d) {
            $cart = Cart_item::join('shopping_carts', 'cart_items.cart_id', '=', 'shopping_carts.cart_id')
                ->join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->where('cart_items.user_id',  Auth::user()->id)
                // ->where('cart_items.checked',  null)
                ->where('shopping_carts.cartdate', $d->cartdate)
                ->get();

            $discart[$d->cartdate] = $cart;

            //  $keyn[] =  key($discart[$d->cartdate]);
        }
        // $keyn[] =  array_reverse(array_keys($discart));
        // foreach( array_reverse($discart) as $key => $dc){
        //     echo  $key. ' ';
        // }


        // dd(count($disd ), array_reverse($discart) ,$keyn );
        return view('customer.cart.mycart', ['carts' => array_reverse($discart)]);
    }



    public function addtocart1($id)
    {



        $product = Product::findOrFail($id);

        $existItem = Cart_item::where('product_id', $product->product_id)
            ->where('user_id', Auth::user()->id)
            ->where('checked', null)
            ->exists();
        if ($existItem) {

            return redirect()->route('customer.cart.show')->with('success', 'this item ' . $product->product_name . ' is already listed in your cart');
        } else {
            $checks = Shopping_cart::where('user_id', Auth::user()->id)->get();
            if (!count($checks) == 0) {
                if (!Shopping_cart::where('user_id', Auth::user()->id)
                    ->where('cartdate', Carbon::today('Asia/Manila')->toDateString())
                    ->exists()) {


                    $checks2 = Shopping_cart::latest()->where('user_id', Auth::user()->id)->first();
                    $scart = new Shopping_cart();
                    $scart->user_id = Auth::user()->id;
                    $scart->cartset = $checks2->cartset + 1;
                    $scart->cartdate =  Carbon::today('Asia/Manila')->toDateString();
                    $scart->checked = 0;
                    $scart->save();
                } else {
                    $scart = Shopping_cart::latest()->where('user_id', Auth::user()->id)->first();
                }
            }
            if (count($checks) == 0) {
                $scart = new Shopping_cart();
                $scart->user_id = Auth::user()->id;
                $scart->cartset = 1;
                $scart->cartdate = Carbon::today('Asia/Manila')->toDateString();
                $scart->checked = 0;
                $scart->save();
            }





            $items = new Cart_item();
            $items->cart_itemname = $product->product_name;
            $items->product_id = $product->product_id;
            $items->cart_id = $scart->cart_id;
            $items->retailer_id = $product->retailer_id;
            $items->user_id = Auth::user()->id;
            $items->cart_quantity = 1;

            $items->cart_itemcost = $product->product_price;
            $items->cart_subtotal = $product->product_price;
            $items->save();

            return redirect()->route('customer.cart.show')->with('success',  'added ' . $product->product_name . ' to cart');
        }
    }

    public function updatequantity($id)
    {
        request()->validate([
            'quantity' => 'required|min:1'
        ]);
        $item = Cart_item::find($id)->where('user_id',  Auth::user()->id)->first();


        if ($item->user_id ==  Auth::user()->id) {
            $item->cart_quantity = request()->quantity;
            $item->cart_subtotal = $item->cart_itemcost * request()->quantity;
            $item->save();
            return redirect()->route('customer.cart.show')->with('success', 'updated quantity for ' . $item->cart_itemname . ' from cart to  X'. request()->quantity . '.' );
        } else {
            return redirect()->route('store');
        }
    }


    public function removecartitem($id)
    {


        $item = Cart_item::where('product_id', $id)->where('user_id',  Auth::user()->id)->first();
        if ($item->user_id ==  Auth::user()->id) {
            Cart_item::where('product_id', $id)->where('user_id',  Auth::user()->id)->delete();
            return redirect()->route('customer.cart.show')->with('success', 'Removed ' . $item->cart_itemname . ' from cart.');
        } else {
            return redirect()->route('store');
        }
    }
}
