<?php

namespace App\Http\Controllers;

use App\Models\Card;
use  App\Models\Card_type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use MarvinLabs\Luhn\Facades\Luhn;

class CardController extends Controller
{

    public function mycards()
    {
        if (Auth::user()->addres != null || Auth::user()->govtid_numbe != null || Auth::user()->cp_number != null ||  Auth::user()->birthday != null) {

            $mycards = Card::latest()->where('user_id', Auth::user()->id)->get();
            // /$mycards->card_number = Crypt::decryptString($mycards->card_number);

            return view('customer.card.mycards', ['mycards' => $mycards]);
        } else {
            return redirect()->route('customer.profile.show')->with("success", "Please complete Your credentials Before adding your card as a payment method");
        }
    }

    public function register()
    {
        if (Auth::user()->addres != null || Auth::user()->govtid_numbe != null || Auth::user()->cp_number != null ||  Auth::user()->birthday != null) {
            return view('customer.card.register');
        } else {
            return redirect()->route('customer.profile.show')->with("success", "Please complete Your credentials Before adding your card as a payment method");
        }
    }

    public function remove($id)
    {
        Card::find($id)->delete();

      return redirect()->route('customer.payment.mycards')->with('success', 'Payment method has been removed');
    }



    public function addcard(Request $request)
    {

        $mycards = Card::latest()->where('user_id', Auth::user()->id)->select('card_number')->get();
        $ucards = array();
        foreach ($mycards as $c) {
            $ucards[] = Crypt::decryptString($c->card_number);
        }


        $request->validate([
            'card_number' => ['luhn', 'required'],
            'card_holdername' => 'required',
            'card_cvv' => 'required',
            'card_exp' => 'required',
            //set billing address
            'card_line1' => 'required',
            'card_city' => 'required',
            'card_state' => 'required',
            'card_postal_code' => 'required'
        ]);




        $m = date("m", strtotime(request('card_exp')));
        $y = date("y", strtotime(request('card_exp')));
        $mon = ['month' => $m, 'year' => $y];
        $jso = json_encode($mon);
        $ejso =  Crypt::encryptString($jso);


        $valid =  Luhn::isValid(request('card_number'));


        if ($valid == true) {
            if (in_array(request('card_number'), $ucards)) {

                return redirect(url()->previous())
                ->with('err', 'This payment method already exist within our system');
            }

            $card =  new Card();
            $card->card_number = Crypt::encryptString(request('card_number'));
            $card->card_holdername = Crypt::encryptString(request('card_holdername'));
            $card->card_cvv = Crypt::encryptString(request('card_cvv'));
            $card->card_exp = $ejso;
            $card->user_id = Auth::user()->id;
            $card->card_line1 = Crypt::encryptString(request("card_line1"));
            $card->card_city = request("card_city");
            $card->card_state = request("card_state");
            $card->card_postal_code = Crypt::encryptString(request("card_postal_code"));


            $card->save();
        }


        return redirect()->route('customer.profile.show');
    }


    protected function maskNumber($number)
    {

        $mask_num =  str_repeat("*", strlen($number) - 4) . substr($number, -4);

        return $mask_num;
    }
}
