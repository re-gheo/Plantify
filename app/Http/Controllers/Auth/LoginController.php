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
        if(Auth::user()->user_stateid == 2){
            Auth::logout();
            abort(403, "Cannot access to restricted page");
        }

        //dd(Auth::user()->user_role);
        switch (Auth::user()->user_role) {
            case 'admin':
                $this->redirectTo = ('admin/home');
                return $this->redirectTo;
                break;
            // case 'customer':
            //     $this->redirectTo = ('customer/home');
            //     return $this->redirectTo;
            //     break;

            // case 'retailer':
            //     $this->redirectTo = ('retailer/home');
            //     return $this->redirectTo;
            //     break;
            default:
                $this->redirectTo = '/';
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
                Auth::logout();
                abort(403, "Cannot access to restricted page");
            }
            request()->session()->put('emailtemp', $user->email);
            $user = User::where('email', '=', $user->email)->first();
            Auth::login($user);
            return redirect('/');
        }
        else{

            $this->_registerFacebookUser($user);
            return redirect('/setup');
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
                Auth::logout();
                abort(403, "Cannot access to restricted page");
            }

            request()->session()->put('emailtemp', $user->email);
            $user = User::where('email', '=', $user->email)->first();
            Auth::login($user);
            return redirect('/');
        }else{
            $this->_registerGoogleUser($user);
            return redirect('/setup');
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
            $user->save();
        }
        Auth::login($user);

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
            $user->save();
        }
        Auth::login($user);

    }
}
