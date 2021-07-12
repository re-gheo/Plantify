<?php

namespace App\Http\Controllers\Auth;

use Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AccountRegister;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo =  route('addc.setup');
    protected function redirectTo()
    {
        Session::flash('success', 'Your  Email has been registered. Please fill your credential for us to verify your identity.');
        return route('addc.setup');

        Session::flash('success', 'Your Registration Has Been Succesful. Please wait while we verify your account. ABout 1 - 3 days');
        return route('store');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // request()->session()->put('emailtemp',$data['email']);
      
         $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            //'name' => $data['name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'user_role' => 'customer',
            'region' => "National Capital Region (NCR)",
            'otp_verified' => 0,
            'password' => Hash::make($data['password']),
            'user_stateid' => 4,
            'remarks' => "Your account is being verified. ",

        ]);
        Auth::login($user);
        return $user;
        
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        Mail::to($request->email)->send( new AccountRegister() );
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
}
