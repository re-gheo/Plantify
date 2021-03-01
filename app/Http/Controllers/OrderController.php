<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Luigel\Paymongo\Facades\Paymongo;
use Luigel\Paymongo\Models\BaseModel;
use Luigel\Paymongo\Models\PaymentMethod;
use Luigel\Paymongo\Exceptions\BadRequestException;

class OrderController extends Controller
{



    public function addtocheckout(Request $request)
    {

        request()->validate([
            'hidid' => 'required'
        ]);

        if (request()->hidid != null) {
            request()->session()->put('selected_item', request()->hidid);
        }

        $ses = request()->session()->get('selected_item');
        //    $items = Cart_item::find(json_decode($ses));
        //    dd($items );
        return redirect('/store/checkout');
    }

    public function checkoutpage(Request $request)
    {
        $ses = request()->session()->get('selected_item');
        $sel = json_decode($ses);
        if ($ses != null) {
            $items = Cart_item::join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->join('retailers', 'cart_items.retailer_id', '=', 'retailers.retailer_id')
                ->join('stores', 'retailers.store_id', '=', 'stores.store_id')
                ->get()->find($sel);
            $sum = collect($items)->sum('cart_subtotal');
            $msum = number_format($sum, 2, '.', '');
            $gsum = $sum + 50;
            $mgsum = number_format($gsum, 2, '.', '');
            $cost = ['subtotal' =>  $msum, 'grandtotal' => $mgsum];

            $mycards = Card::latest()->where('user_id', Auth::user()->id)->get();


            return view('customer.checkout.checkout', ['items' =>  $items, "mycards" => $mycards, 'cost' => $cost]);
        } else {
            return redirect('/store/cart')->with('success',  'no products where select in the checkout');
        }
    }




    public function placeorder(Request $request)
    {
        $ses = request()->session()->get('selected_item');
        $sel = json_decode($ses);
        if ($ses != null) {
            $items = Cart_item::join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->join('retailers', 'cart_items.retailer_id', '=', 'retailers.retailer_id')
                ->join('stores', 'retailers.store_id', '=', 'stores.store_id')
                ->get()->find($sel);
            $sum = collect($items)->sum('cart_subtotal');
            $msum = number_format($sum, 2, '.', '');
            $gsum = $sum + 50;
            $mgsum = number_format($gsum, 2, '.', '');
            $cost = ['subtotal' =>  $msum, 'grandtotal' => $mgsum];

            
        }

        // dd(json_decode($request->paytype)[0], $cost ,  $ses,  $sel);

        if (json_decode($request->paytype)[0] == 1) {
            $mycards = Card::where('user_id', Auth::user()->id)->get()->find(json_decode($request->paytype)[1]);


            $paymentIntent = Paymongo::paymentIntent()->create([
                'amount' =>  $cost['grandtotal'],
                'payment_method_allowed' => [
                    'card'
                ],
                'payment_method_options' => [
                    'card' => [
                        'request_three_d_secure' => 'automatic'
                    ]
                ],
                'description' => 'This is a test payment intent',
                'statement_descriptor' => 'PLANTIFY STORE ORDER PRODUCT',
                'currency' => "PHP",
            ]);

            try {
                $paymentMethod = Paymongo::paymentMethod()->create([
                    'type' => 'card',
                    'details' => [
                        'card_number' => Crypt::decryptString($mycards->card_number),
                        'exp_month' => 12,
                        'exp_year' => 25,
                        'cvc' => Crypt::decryptString($mycards->card_cvv),
                    ],
                    'billing' => [
                        'address' => [
                            'line1' => 'Somewhere there',
                            'city' => 'Cebu City',
                            'state' => 'Cebu',
                            'country' => 'PH',
                            'postal_code' => '6000',
                        ],
                        'name' => Crypt::decryptString($mycards->card_holdername),
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->cp_number,
                    ],
                ]);

                $attachedPaymentIntent = $paymentIntent->attach($paymentMethod->id);

                dd(
                    $paymentIntent->id,
                    $paymentIntent,
                    $paymentMethod->id,
                    $paymentMethod,
                    $attachedPaymentIntent,
                    $attachedPaymentIntent->status
                );
            } catch (BadRequestException $e) {
                dd(json_decode($e->getMessage(), true)['errors'][0]["sub_code"]);
            }
        }
    }
}
