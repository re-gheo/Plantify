<?php

namespace App\Http\Controllers;

use App\Models\Retailer_application;
use Illuminate\Http\Request;

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
        dd(request()->retailer_address);
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
