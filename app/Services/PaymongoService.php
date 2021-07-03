<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Luigel\Paymongo\Facades\Paymongo;
use Luigel\Paymongo\Models\BaseModel;
use Luigel\Paymongo\Models\PaymentMethod;
use Luigel\Paymongo\Exceptions\BadRequestException;


class PaymongoService
{



    private $retailer;

    public function __construct($retailer = null)
    {
        $this->retailer = $retailer;
    }

    public function handleCard($validated)
    {

        // dd($validated->cvv);
        $paymentIntent = Paymongo::paymentIntent()->create([
            'amount' =>  1500, // this is a test
            'payment_method_allowed' => [
                'card'
            ],
            'payment_method_options' => [
                'card' => [
                    'request_three_d_secure' => 'automatic'
                ]
            ],
            'description' => 'PLANTIFY TEST PAID Subscriptions Basic',
            'statement_descriptor' => 'PLANTIFY Subscriptions Basic',
            'currency' => "PHP",
        ]);
        // dump('this int', $paymentIntent);
        try {
            $paymentMethod = Paymongo::paymentMethod()->create([
                'type' => 'card',
                'details' => [
                    'card_number' => $validated->number,
                    'exp_month' => (int)date('m', strtotime($validated->card_exp)),
                    'exp_year' => (int)date('y', strtotime($validated->card_exp)),
                    'cvc' => $validated->cvv,
                ],
                'billing' => [
                    'address' => [
                        'line1' => $validated->line1,
                        'city' => $validated->city,
                        'state' => $validated->state,
                        'country' => 'PH',
                        'postal_code' => $validated->postal_code,
                    ],
                    'name' => $validated->holdername,
                    'email' => Auth::user()->email, //emaul
                    'phone' => Auth::user()->cp_number,
                ],
            ]);
            // dump("this method success", $paymentMethod);

            $attachedPaymentIntent = $paymentIntent->attach($paymentMethod->id);
        } catch (BadRequestException $e) {
            dd(json_decode($e->getMessage(), true)['errors'][0]);
            dd(json_decode($e->getMessage(), true)['errors'][0]["sub_code"]);
        }
        dump(Paymongo::payment()->all());
    }


    public function handleGcash()
    {

        $sample_ammont = 1500.00;
        $source = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $sample_ammont,
            'currency' => 'PHP',
            'redirect' => [
             
                'success' => route('paymongo.success'),
                'failed' => route('paymongo.failed'),
            ],
        ]);
            dump($source);

        // return redirect($source->redirect['checkout_url']);
    }
}
