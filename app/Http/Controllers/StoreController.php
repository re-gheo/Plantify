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

        return redirect ('/store')->with('success', 'Successfully Registered Your Store!');
    }

    public function edit(){
        $store =  Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        
        if(!$store->store_name || !$store->store_description) {
            return view('retailer.store.setup');
        }
        return view('retailer.store.customize', ['store'=>$store]);
    }

    public function update(){
        

        request()->validate([
            'store_name'=>['required'],
               'store_description'=>['required']
           ]);

        $ret = Retailer::leftJoin('stores', 'retailers.store_id' , '=' , 'stores.store_id')->findOrFail(Auth::user()->id);
        $store = Store::findOrFail($ret->store_id);
        $store->store_name = request('store_name');
        $store->store_description = request('store_description');
        // $store->store_backgroundimage = request('store_backgroundimage')->store('store','public');
        // $store->store_profileimage= request('store_profileimage')->store('store','public');
 
        if(request()->hasFile('store_backgroundimage')){
            $store->store_backgroundimage = request('store_backgroundimage')->store('store','public');
        }
        if(request()->hasFile('store_profileimage')){
            $store->store_profileimage = request('store_profileimage')->store('store','public');
        }

        $store->save();

        return redirect ('/store')->with('success', 'Successfully Updated Your Store!');
    }



}
