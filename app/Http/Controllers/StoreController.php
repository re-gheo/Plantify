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
       
        $ret = Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        $store = Store::findOrFail($ret->store_id);
        $store->store_name = request('store_name');
        $store->store_description = request('store_description');
        $store->save();

        return redirect ('/settings/store/')->with('success', 'successfully register your store name');
    }

    public function edit(){
        $store =  Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        
        if(!$store->store_name || !$store->store_description) {
            return view('retailer.store.setup');
        }
        return view('retailer.store.customize', ['store'=>$store]);
    }

    public function update(){
        
        $ret = Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        $store = Store::findOrFail($ret->store_id);
        $store->store_name = request('store_name');
        $store->store_description = request('store_description');
        $store->save();

        return redirect ('/settings/store/')->with('success', 'successfully register your store name');
    }



}
