<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Retailer;
use App\Services\LogServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function front($id = null)
    {
        if($id){
            $store =  Retailer::leftJoin('stores', 'retailers.store_id', '=', 'stores.store_id')->findOrFail($id);
            return view('retailer.store.storepage', ['store' => $store]);
        }else{
            $store =  Retailer::leftJoin('stores', 'retailers.store_id', '=', 'stores.store_id')->findOrFail(Auth::user()->id);
            if (!$store->store_name || !$store->store_description) {
                return view('retailer.store.setup');
            }

            return view('retailer.store.storepage', ['store' => $store]);

        }


    }

    public function setup()
    {
        return view('retailer.store.setup');
    }

    public function setupstore()
    {
        $ret = Retailer::leftJoin('stores', 'retailers.store_id', '=', 'stores.store_id')->findOrFail(Auth::user()->id);
        $store = Store::findOrFail($ret->store_id);
        $store->store_name = request('store_name');
        $store->store_description = request('store_description');
        $store->save();

        LogServices::log('setup store');

        return redirect()->route('retailer.store.front')->with('success', 'Successfully Registered Your Store!');
    }

    public function edit()
    {
        $store =  Retailer::leftJoin('stores', 'retailers.store_id', '=', 'stores.store_id')
            ->findOrFail(Auth::user()->id);

        if (!$store->store_name || !$store->store_description) {
            return view('retailer.store.setup');
        }
        return view('retailer.store.customize', ['store' => $store]);
    }

    public function update()
    {
        request()->validate([
            'store_description' => ['required']
        ]);
        $ret = Retailer::leftJoin('stores', 'retailers.store_id', '=', 'stores.store_id')
            ->findOrFail(Auth::user()->id);



        $store = Store::findOrFail($ret->store_id);
        $ret->store_codoption =  request('cod_option');
        $store->store_description = request('store_description');
        if (request()->hasFile('store_backgroundimage')) {
            $store->store_backgroundimage = request('store_backgroundimage')->store('store', 'public');
        }
        if (request()->hasFile('store_profileimage')) {
            $store->store_profileimage = request('store_profileimage')->store('store', 'public');
        }

        $store->save();

        LogServices::log('update store');

        return redirect()->route('retailer.store.front')->with('success', 'Successfully Updated Your Store!');
    }

    public function show($id){
        return view('retailer.store.showProducts', ['store' => Store::findOrFail($id)]);
    }

    public function setGcash()
    {
    }

    public function setPayoutCard()
    {
    }
}
