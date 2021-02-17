<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function front(){



        $store =  Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        
        if(!$store->store_name || !$store->store_description) {
            return view('retailer.store.setup');
        }
        return view('retailer.store.storepage', ['store'=>$store]);
    }

    public function setup(){
        return view('retailer.store.setup');
    }
    public function setupstore(){
       
        $store = Store::leftJoin('retailers', 'stores.store_id' , '=' , 'retailers.store_id')->where('retailer_id', '=', Auth::user()->id);

        dd($store);
        $store->store_name = request('store_name');
        $store->store_description = request('store_description');
        $store->save();
       
        return redirect ('/settings/store/')->with('success', 'successfully register your store name');
    }

    public function edit(){
        
    }

    public function update(){
        
    }



}
