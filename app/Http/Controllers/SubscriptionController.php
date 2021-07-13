<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
        $retailer = Retailer::with('subscription', 'invoice', 'store')->find(Auth::user()->id);
        
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

        $invoice = Invoice::create([
            'retailer_id' => $id,
            'duration' => $duration,
            'first_name'=> Auth::user()->first_name,
            'last_name'=> Auth::user()->last_name,
            'email' => Auth::user()->email,
            'total_amount' => $ammount,
            'payment_state' => 'PAID',
            'payment_method' => 'CARD',
        ]);
        Subscription::create([
            'retailer_id' => $id,
            'invoice_id' => $invoice->id,
            'plan_id' => $request->plan,
            'date_start' => Carbon::today(),
            'date_end' => Carbon::today()->addDays($duration),
            'duration' => $duration,
        ]);
    }
}
