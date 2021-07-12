<?php

namespace App\Http\Controllers\Auth;



use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AccountRegister;

use App\Services\LogServices;
use App\Http\Controllers\Controller;
use App\Rules\AuthenticateRecaptcha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;
    public function redirectTo()
    {
        
        if (Auth::user()->govtid_number == null && Auth::user()->birthday == null) {
       
            // Auth::logout();
            return route('addc.setup');
            
            // return redirect()->route("store")->with('success',"Please Complete your credentials");
        }

        if(Auth::user()->user_stateid == 4){
            $remarks = Auth::user()->remarks;
            Auth::logout();
            abort(403, $remarks);
        }

        //dd(Auth::user()->user_role);
        LogServices::log('login');
        switch (Auth::user()->user_role) {
            case 'admin':
                $this->redirectTo = ('admin/home');
                return $this->redirectTo;
                break;
        
            default:
                $this->redirectTo = route('store');
                return $this->redirectTo;
                break;


        }

        // return $next($request);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('banned', ['only' => ['redirectTo']]);
    }

    // facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        if(User::where('email', '=', $user->email)->exists()){

            if(Auth::user()->user_stateid == 2){
                $remarks = Auth::user()->remarks;
            Auth::logout();
            abort(403, $remarks);
            }
            request()->session()->put('emailtemp', $user->email);
            $user = User::where('email', '=', $user->email)->first();
            Auth::login($user);
            LogServices::log('login');
            return redirect()->route('store');
        }
        else{

            $this->_registerFacebookUser($user);
            return redirect()->route('addc.setup');
        }
    }


    //google
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->with(["prompt" => "select_account"])->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        if(User::where('email', '=', $user->email)->exists()){
            if(Auth::user()->user_stateid == 2){
                $remarks = Auth::user()->remarks;
            Auth::logout();
            abort(403, $remarks);
            }

            request()->session()->put('emailtemp', $user->email);
            $user = User::where('email', '=', $user->email)->first();
            Auth::login($user);
            LogServices::log('login');
            return redirect()->route('store');
        }else{
            $this->_registerGoogleUser($user);
            return redirect()->route('addc.setup');
        }



    }

    protected function _registerGoogleUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->name = $data->name;
            $user->first_name = $data->user['given_name'];
            $user->last_name = $data->user['family_name'];
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->user_role = "customer";
            $user->user_stateid = 4;
            $user->save();
        }
        Auth::login($user);
        Mail::to($data->email)->send( new AccountRegister() );

    }
    protected function _registerFacebookUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->user_role = "customer";
            $user->user_stateid = 4;
            $user->save();
        }
        Auth::login($user);
        Mail::to($data->email)->send( new AccountRegister() );

    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required' , new AuthenticateRecaptcha
        ]);

    }
}
