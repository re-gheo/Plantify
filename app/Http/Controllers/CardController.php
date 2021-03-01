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
    
    public function mycards(){

         $mycards = Card::latest() -> where('user_id', Auth::user()->id)->get();
        // /$mycards->card_number = Crypt::decryptString($mycards->card_number);
        dump($mycards);
        return view('customer.card.mycards' , [ 'mycards' => $mycards]);
    }

    public function register(){
        return view('customer.card.register');
    }


    
    public function addcard(Request $request)
    {

   
        $request->validate([
            'card_number' => ['luhn', 'required'],
            'card_holdername' =>'required',
            'card_cvv' =>'required',
            'card_exp'=> 'required'

    ]);

        
    
         $m = date("m", strtotime(request('card_exp')));
         $y = date("y", strtotime(request('card_exp')));
        $mon = ['month' => $m, 'year'=> $y];
        $jso= json_encode($mon);
        $ejso =  Crypt::encryptString($jso);
       
      $valid=  Luhn::isValid(request('card_number'));
      

        if($valid == true){
            $card =  new Card();
            $card->card_number = Crypt::encryptString(request('card_number'));
            $card->card_holdername = Crypt::encryptString(request('card_holdername'));
            $card->card_cvv = Crypt::encryptString(request('card_cvv'));
            $card->card_exp = $ejso;
            $card->user_id =Auth::user()->id;
            $card->save();
        }
     
        
        return redirect('/settings/profile');
    }


 protected function maskNumber($number){
    
        $mask_num =  str_repeat("*", strlen($number)-4) . substr($number, -4);
        
        return $mask_num;
    }
}
