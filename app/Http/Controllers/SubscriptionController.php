<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use App\Models\Subscription;
use Illuminate\Http\Request;

use App\Services\PaymongoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('retailer.subscription.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->all());
        // dd($request->plan);
        switch ($request->plan) {
            case 1:
                $ammount = 259.00;
                $duration = 30;
                
                break;
            case 2:
                $ammount = 499.00;
                $duration = 90;

                break;
            case 3:
                $ammount = 699.00;
                $duration = 180;

                break;

        }
dd(Auth::user());
        // dump('here');
        $pay = new PaymongoService;
        $result = $pay->handleCard($request, $ammount);
        if ($result[0]) {
            $this->handleSubscription(Auth::user()->id, $request,  $ammount, $duration);
            return redirect()->route('subscriptions.show', Auth::user()->id);
        } else {
            return $result[1];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(Retailer::with('subscription')->get());
        dd($id);
        return view('retailer.subscription.show', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function handleSubscription($id, $request,  $ammount, $duration)
    {
        $retiailer = Retailer::find($id);
       
        Subscription::create([
            'retailer_id'=> $id,
            'plan_id'=> $request->plan,
            'date_start'=> Carbon::today(),
            'date_end'=> Carbon::today()->addDays($duration),
            'duration'=> $duration,
            'email'=> Auth::user()->email,
            'payment_state'=> 'PAID',
            'payment_method'=>'CARD',
            'total_amount'=> $ammount,
        ]);
        
    }
}
