<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Retailer_application;
use Illuminate\Support\Facades\Auth;

class RetailerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Customer
    public function form()
    {
        return view('customer.settings.application.application');
    }

    

    public function send(Request $request)
    {
        //dd(request()->retailer_address);


        $form = new Retailer_application();
        $form->retailer_address = request('retailer_address');        
        $form->retailer_postalcode = request('retailer_postalcode');
        $form->retailer_personincharge= request('retailer_personincharge');
        $form->retailer_officialidfront = request('retailer_officialidfront')->store('officialid','public');
        $form->retailer_officialidback= request('retailer_officialidback')->store('officialid','public');
        $form->retailer_region = request('retailer_region');
        $form->retailer_city = request('retailer_city');
        $form->retailer_approvalstateid = 3;
        $form->user_id = Auth::user()->id;
        $form->save();
        $form->retailer_applicationid;


        $user = User::where('email',Auth::user()->email)->first();
        $user->retailer_approvalstateid = 3;
        $user->save();


        return redirect('/settings/profile')->with('success', 'Successfully sent an application and pending approval.'); 
    

    }


// ADMIN


    public function index()
    {
        
    }

    public function show()
    {
        
    }

    public function approve()
    {
        
    }

    public function deny()
    {
        
    }

   
}
