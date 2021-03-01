<?php

namespace App\Http\Controllers;

use App\Models\Card;
use  App\Models\Card_type;

use Illuminate\Http\Request;
use MarvinLabs\Luhn\Facades\Luhn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CardController extends Controller
{

    public function mycards()
    {
        if (Auth::user()->addres != null || Auth::user()->govtid_numbe != null || Auth::user()->cp_number != null ||  Auth::user()->birthday != null) {

            $mycards = Card::latest()->where('user_id', Auth::user()->id)->get();
            // /$mycards->card_number = Crypt::decryptString($mycards->card_number);

            return view('customer.card.mycards', ['mycards' => $mycards]);
        } else {
            return redirect('/settings/profile')->with("success", "Please complete Your credentials Before adding your card as a payment method");
        }
    }

    public function register()
    {
        if (Auth::user()->addres != null || Auth::user()->govtid_numbe != null || Auth::user()->cp_number != null ||  Auth::user()->birthday != null) {
            return view('customer.card.register');
        } else {
            return redirect('/settings/profile')->with("success", "Please complete Your credentials Before adding your card as a payment method");
        }
    }



    public function addcard(Request $request)
    {

        $request->validate([
            'card_number' => ['luhn', 'required'],
            'card_holdername' => 'required',
            'card_cvv' => 'required',
            'card_exp' => 'required'

        ]);



        $m = date("m", strtotime(request('card_exp')));
        $y = date("y", strtotime(request('card_exp')));
        $mon = ['month' => $m, 'year' => $y];
        $jso = json_encode($mon);
        $ejso =  Crypt::encryptString($jso);

        $valid =  Luhn::isValid(request('card_number'));


        if ($valid == true) {
            $card =  new Card();
            $card->card_number = Crypt::encryptString(request('card_number'));
            $card->card_holdername = Crypt::encryptString(request('card_holdername'));
            $card->card_cvv = Crypt::encryptString(request('card_cvv'));
            $card->card_exp = $ejso;
            $card->user_id = Auth::user()->id;
            $card->save();
        }


        return redirect('/settings/profile');
    }


    protected function maskNumber($number)
    {

        $mask_num =  str_repeat("*", strlen($number) - 4) . substr($number, -4);

        return $mask_num;
    }
}
