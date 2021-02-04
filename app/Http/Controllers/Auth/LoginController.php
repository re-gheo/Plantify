<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use Socialite;
use Auth;

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
        //dd(Auth::user()->user_role);
        switch (Auth::user()->user_role) {
            case 'admin':
                $this->redirectTo = ('admin/home');
                return $this->redirectTo;
                break;
            case 'customer':
                $this->redirectTo = ('customer/home');
                return '/';
                break;

            case 'retailer':
                $this->redirectTo = ('retailer/storefront');
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/home';
                return $this->redirectTo;
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
    }

    // facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // dd($user);

        $this->_registerOrLoginfacebookUser($user);
        //Auth::login($user);

        return redirect()->route('home');
    }


    //google
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->with(["prompt" => "select_account"])->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();


        $this->_registerOrLoginGoogleUser($user);

        return view('/retailer/storefront');
    }

    protected function _registerOrLoginGoogleUser($data)
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
            $user->save();
        }
        Auth::login($user);
    }
    protected function _registerOrLoginfacebookUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->user_role = "customer";
            $user->save();
        }
        Auth::login($user);
    }
}
