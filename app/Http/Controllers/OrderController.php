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
use App\Classes\Trackingmore;
use App\Models\Order_bystoreitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Luigel\Paymongo\Facades\Paymongo;
use Luigel\Paymongo\Models\BaseModel;
use Luigel\Paymongo\Models\PaymentMethod;
use Luigel\Paymongo\Exceptions\BadRequestException;

use Session;

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

        return redirect()->route('customer.checkout.show');
    }

    public function checkoutpage(Request $request)
    {
        $ses = request()->session()->get('selected_item');

        $sel = json_decode($ses);
        if ($ses != null) {
            $items = Cart_item::join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->join('retailers', 'cart_items.retailer_id', '=', 'retailers.retailer_id')
                ->join('stores', 'retailers.store_id', '=', 'stores.store_id')
                ->where('cart_items.checked',  null)
                ->get()->find($sel);




            $sum = collect($items)->sum('cart_subtotal');
            $msum = number_format($sum, 2, '.', '');
            $gsum = $sum + 50;
            $mgsum = number_format($gsum, 2, '.', '');
            $cost = ['subtotal' =>  $msum, 'grandtotal' => $mgsum];

            $mycards = Card::latest()->where('user_id', Auth::user()->id)->get();


            return view('customer.checkout.checkout', ['items' =>  $items, "mycards" => $mycards, 'cost' => $cost]);
        } else {
            return redirect()->route('customer.cart.show')->with('success',  'no products where select in the checkout');
        }
    }

    public function placeorder(Request $request)
    {
        // $tmore = new Trackingmore();
        // $gdata = $tmore->getSingleTrackingResult("ninjavan-ph",   "KUEB4730128991");

        // dd(  $gdata["data"]["id"] );
        $items_id = [];
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


            foreach ($items as $item) {
                $item->id = array_push($items_id, $item->cart_itemid);
            }
        }
       
    

        if (json_decode($request->paytype)[0] == 1) {
            $mycards = Card::where('user_id', Auth::user()->id)->get()->find(json_decode($request->paytype)[1]);
            // dd($mycards);
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
            } catch (BadRequestException $e) {
                dd(json_decode($e->getMessage(), true)['errors'][0]["sub_code"]);
            }

            // dd("hello",
            //     $paymentIntent->id,
            //     $paymentIntent,
            //     $paymentMethod->id,
            //     $paymentMethod,
            //     $attachedPaymentIntent,
            //     $attachedPaymentIntent->status
            // );
            $order = new Order();
            $order->payment_type = 1;
            $order->order_datecreated = Carbon::now('Asia/Manila');
            $order->order_dateshipped = Carbon::now('Asia/Manila')->addDay(3);
            $order->order_statusid = 2;
            $order->save();

            $detemp = $this->genID();

            $details =  new Order_detail();
            $details->orderdetails_id = $detemp;
            $details->products = $ses;
            $details->order_id =  $order->order_id;
            $details->paymentintentid = $attachedPaymentIntent->id;
            $details->order_unitcost = $sum;
            $details->order_subtotal = $gsum;
            $details->user_id = Auth::user()->id;
            $details->save();



            foreach ($items as $i) {

                if (!Customer::where('user_id', '=', Auth::user()->id)->where('retailer_id', $i->retailer_id)->exists()) {
                    $customer =  new Customer();
                    $customer->user_id = Auth::user()->id;
                    $customer->retailer_id = $i->retailer_id;
                    $customer->save();
                }

                $ucustomer = Customer::where('user_id', '=', Auth::user()->id)->where('retailer_id', $i->retailer_id)->first();



                $items = Cart_item::find($i->cart_itemid);
                $items->checked = 1;
                $items->save();

                // dd("hello2");
                $tmore = new Trackingmore();
                $data =  $tmore->createTracking(
                    "ninjavan-ph",
                    $detemp,
                    [

                        'title' => $i->product_name . ' by ' .  $i->store_name,
                        'logistics_channel' => "",
                        'customer_name' => Auth::user()->name,
                        'customer_email' => Auth::user()->email,
                        'order_id' =>  $order->order_id,
                        'customer_phone' => Auth::user()->cp_number,
                        'order_create_time' => Carbon::now('Asia/Manila')->addDay(3),
                        'tracking_postal_code' => "1105"
                    ]
                );

                $gdata = $tmore->getSingleTrackingResult("ninjavan-ph",   $detemp);


                // dd($data ,  $gdata,  $detemp);
                $bystore =  new Order_bystoreitem();
                $bystore->product_id = $i->product_id;
                $bystore->retailer_id = $i->retailer_id;
                $bystore->order_customerid = $ucustomer->customer_id;
                $bystore->order_id  = $order->order_id;

                $bystore->order_quantity = $i->cart_quantity;
                $bystore->order_unitcost = $i->cart_itemcost;
                $bystore->order_subtotal = $i->cart_subtotal;
                $bystore->save();
            }
            $request->session()->forget('selected_item');
            return redirect()->route('store')->with('success', 'Successfully created an order');
        } elseif (json_decode($request->paytype)[0] == 0) {
            $source = Paymongo::source()->create([
                'type' => 'gcash',
                'amount' => $gsum,
                'currency' => 'PHP',
                'redirect' => [
                    'success' => route('customer.checkout.success', ['id' => $items_id]),
                    'failed' => route('customer.checkout.failed'),
                ],
            ]);

            return redirect($source->redirect['checkout_url']);
        }
    }


    public function redirectPaymongoSuccess(Request $request)
    {
        $cart_items = $request->id;

        foreach ($cart_items as $items) {

            $order = Order::create([
                'payment_type' => 2,
                'order_datecreated' => Carbon::now('Asia/Manila'),
                'order_dateshipped' => Carbon::now('Asia/Manila')->addDay(3),
                'order_statusid' => 3,
            ]);

            $cart_item = Cart_item::find($items);

            $order->details()->create([
                'payment_type' => 2,
                'order_datecreated' => Carbon::now('Asia/Manila'),
                'order_dateshipped' => Carbon::now('Asia/Manila')->addDay(3),
                'user_id' => Auth::user()->id,
            ]);

            // $details =  new Order_detail();
            // $details->orderdetails_id = $detemp;
            // $details->products = $ses;
            // $details->order_id =  $order->order_id;
            // $details->paymentintentid = $attachedPaymentIntent->id;
            // $details->order_unitcost = $sum;
            // $details->order_subtotal = $gsum;
            // $details->user_id = Auth::user()->id;
            // $details->save();
        }

        Session::flash('err', 'Payment Failed! Please try again.');

        return redirect()->route('customer.checkout.show');
    }

    public function redirectPaymongoFailed()
    {
        Session::flash('err', 'Payment Failed! Please try again.');
        return redirect()->route('customer.checkout.show');
    }



    protected function genID()
    {
        $length = 4;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }


        $lengthN = 10;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString2 = '';
        for ($i = 0; $i < $lengthN; $i++) {
            $randomString2 .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . $randomString2;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = Auth::user()->orderDetails;

        return view('customer.order.index', compact('orderDetails'));
    }

    //Order_bystoreitem, Order_detail, Order , Customer
    //customer
    public function list(Request $request)
    { 
        $olist = Order::join('order_details', 'orders.order_id', '=', 'order_details.order_id')->where('order_details.user_id', Auth::user()->id)->get();

        $iarray = array();
        foreach ($olist as $ol) {
            $item = json_decode($ol->products);
           

            foreach ($item as $i) {
                $iarray2[$ol->orderdetails_id][] = Cart_item::join('shopping_carts', 'cart_items.cart_id', '=', 'shopping_carts.cart_id')
                    ->join('products', 'cart_items.product_id', '=', 'products.product_id')
                    ->where('cart_items.user_id',  Auth::user()->id)
                    ->where('cart_items.cart_itemid',  $i)->get();
            }
        }
       
        return view('customer.order.orderlist', ['olist' => $olist,  'items' => $iarray2]);

    }

    public function detail(Request $request, $id)
    { 

        
        $olist = Order::join('order_details', 'orders.order_id', '=', 'order_details.order_id')->where('order_details.user_id', Auth::user()->id)->where('order_details.orderdetails_id', $id)->first();

       
      
            $items = Cart_item::join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->join('retailers', 'cart_items.retailer_id', '=', 'retailers.retailer_id')
                ->join('stores', 'retailers.store_id', '=', 'stores.store_id')
                ->get()->find( json_decode($olist->products));
        

        return view('customer.order.orderdetails', ['olist' => $olist,  'items' =>  $items]);
    
    }

    public function cancel(Request $request)
    { //put/delete

    }

    public function recieve(Request $request)
    { //put

    }


    //retailer

    public function updateorder(Request $request)
    {
    }

    public function ordercancel(Request $request)
    {
    }
}
