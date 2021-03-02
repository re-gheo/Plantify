<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Cart_item;
use Illuminate\Support\Str;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use App\Models\Order_bystoreitem;
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
        $ses= request()->session()->get('selected_item');
       
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
                        'exp_month' => (int)json_decode(Crypt::decryptString($mycards->card_exp))->month,
                        'exp_year' => (int)json_decode(Crypt::decryptString($mycards->card_exp))->year,
                        'cvc' => Crypt::decryptString($mycards->card_cvv),
                    ],
                    'billing' => [
                        'address' => [
                            'line1' => Crypt::decryptString($mycards->card_line1),
                            'city' => $mycards->card_city,
                            'state' => $mycards->card_state,
                            'country' => 'PH',
                            'postal_code' => Crypt::decryptString($mycards->card_postal_code),
                        ],
                        'name' => Crypt::decryptString($mycards->card_holdername),
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->cp_number,
                    ],
                ]);

                $attachedPaymentIntent = $paymentIntent->attach($paymentMethod->id);

               

                $order = new Order();
                $order->payment_type = 1;
                $order->order_datecreated = Carbon::now('Asia/Manila');
                $order->order_dateshipped = null;
                $order->order_statusid = 2;
                $order->save();
                $details =  new Order_detail();
                $details->orderdetails_id = Str::random(70);
                $details->products= $ses;
                $details->order_id=  $order->order_id;
                $details->paymentintentid = $attachedPaymentIntent;
                $details->order_unitcost= $sum;
                $details->order_subtotal= $gsum;
                $details->user_id= Auth::user()->id;
                $details->save();

                foreach($items as $i){
                    if(!Customer::where('user_id', '=', Auth::user()->id)->where( 'retailer_id',$i->retailer_id)->exists()){
                        $customer =  new Customer();
                        $customer->user_id = Auth::user()->id;
                        $customer->retailer_id = $i->retailer_id;
                        $customer->save();
                    }else{
                        $customer = Customer::where('user_id', '=', Auth::user()->id)->where( 'retailer_id',$i->retailer_id)->get();
                    }
                    $bystore =  new Order_bystoreitem();
                    $bystore->product_id = $i->product_id;
                    $bystore->retailer_id = $i->retailer_id;
                    $bystore->order_customerid =$customer->id;
                    $bystore-> order_id  = $order->order_id;
                    $bystore->shipping_id = '';
                    $bystore->order_quantity = $i->cart_quantity;
                    $bystore->order_unitcost = $i->cart_itemcost;
                    $bystore->order_subtotal =$i->cart_subtotal;
                    $bystore->save();
                }

                
                

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
        } elseif (json_decode($request->paytype)[0] == 0) {
            dd('gccah');
        }
    }
}
