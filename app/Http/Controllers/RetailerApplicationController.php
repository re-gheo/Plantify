<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Retailer_application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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


        // $encrypted = Crypt::encryptString(request('retailer_address'));
        // $decrypted = Crypt::decryptString($encrypted);
        // dd(request('retailer_address'), $encrypted ,$decrypted);

        $form = new Retailer_application();
        $form->retailer_address =  request('retailer_address');
        $form->retailer_postalcode =  Crypt::encryptString(request('retailer_postalcode'));
        $form->retailer_personincharge= request('retailer_personincharge');
        $form->retailer_officialidfront = request('retailer_officialidfront')->store('officialid','public');
        $form->retailer_officialidback= request('retailer_officialidback')->store('officialid','public');
        $form->retailer_idnumber =  Crypt::encryptString(request('retailer_idnumber'));
        $form->retailer_barangay = request('retailer_barangay');
        $form->retailer_region = request('retailer_region');
        $form->retailer_city = request('retailer_city');
        $form->retailer_approvalstateid = 3;
        $form->user_id = Auth::user()->id;
        $form->save();
        $form->retailer_applicationid;



        $user = User::where('email',Auth::user()->email)->first();
        $user->retailer_approvalstateid = 3;
        $user->save();

        return redirect()->route('customer.profile.show')->with('success', 'Successfully sent an application and pending approval.');


    }


// ADMIN


    public function index()
    {

        $apps = Retailer_application::leftJoin('users', 'retailer_applications.user_id', '=' , 'users.id')
        ->leftJoin('retailer_approvalstates', 'retailer_applications.retailer_approvalstateid', '=' , 'retailer_approvalstates.retailer_approvalstateid')->get();


        return view('admin.applications.index',['apps' => $apps]);
    }

    public function show(Request $request, $id)
    {

        $app1 = Retailer_application::findOrFail($id);
        $app2 = Retailer_application::leftJoin('users', 'retailer_applications.user_id', '=' , 'users.id')->where('user_id' ,'=',  $app1->user_id)
        ->leftJoin('retailer_approvalstates', 'retailer_applications.retailer_approvalstateid', '=' , 'retailer_approvalstates.retailer_approvalstateid')
        ->first();
       // dd($app2);
        return view('admin.applications.show',['app' => $app2]);
    }

    public function approve(Request $request, $id)
    {

        $date = Carbon::now();

        $form = Retailer_application::findOrFail($id);
        $form->retailer_approvalstateid = 1;
        $form->save();
        $form->retailer_applicationid;

        $user = User::where('id',  $form->user_id)->first();
        $user->retailer_approvalstateid = 1;
        $user->user_role = 'retailer';
        $user->save();
        $user->id;


        $store = new Store();
        $store->store_dateregistererd = $date;
        $store->store_codoption = 0 ;
        $store->store_phonenumber = $user->cp_number;
        $store->save();
        $store->store_id;

        $retailer = new Retailer();
        $retailer->retailer_id = $user->id;
        $retailer->store_id = $store->store_id;
        $retailer->retailer_address = $form->retailer_address;
        $retailer->retailer_postalcode = $form->retailer_postalcode;
        $retailer->retailer_personincharge =$form->retailer_personincharge;
        $retailer->retailer_officialidfront = $form->retailer_officialidfront;
        $retailer->retailer_officialidback = $form->retailer_officialidfront;
        $retailer->retailer_idnumber =  $form->retailer_idnumber;
        $retailer->retailer_birthdate = $user->birthday;
        $retailer->retailer_city  =  $form->retailer_city;
        $retailer->retailer_barangay  =  $form->retailer_barangay;
        $retailer->retailer_region  =  $form->retailer_region;
        $retailer->save();

        return redirect()->route('admin.customer_application.get')->with('success',  'an application for '. $user->email .' has been approved');
    }

    public function deny(Request $request, $id)
    {
        $request->validate([

            'deny_reason'=> 'required|min:1'
        ]);


        $reas = $request->input('deny_reason' );

        $form = Retailer_application::findOrFail($id);
        $form->retailer_approvalstateid = 2;
        $form->deny_reason = implode(" ",$reas );
        $form->save();

        $form->retailer_applicationid;

        $user = User::where('email',Auth::user()->email)->first();
        $user->retailer_approvalstateid = 2;
        $user->save();

        return redirect()->route('admin.customer_application.get')->with('success',  'an application form has been denied');
    }


}
