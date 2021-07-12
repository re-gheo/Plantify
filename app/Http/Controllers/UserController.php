<?php

namespace App\Http\Controllers;
// use DB;

use App\Http\Requests\UserRequest;
use App\Mail\AccountActivate;
use Exception;
use App\Models\User;
use Vonage\Verify\Client;
use Faker\Calculator\Luhn;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Vonage\Verify\Verification;
use App\Models\Retailer_application;
use App\Services\LogServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function index()
    {
        $user = User::latest()->get();
        return view('admin.accountManagement.user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function setup()
    {

        return view('auth.setup');
    }


    public function setups($email)
    {

        request()->session()->put('emailtemp', $email);
        request()->validate([
            'govtid_type' => 'required',
            'govtid_number' => ['required', 'string', 'min:5', 'max:12'],
            'address' => ['required', 'string', 'max:70'],
            'birthday' => ['required', 'before:-10 years', 'date']
        ]);

        // $data = DB::table('users')->where('email', '=',$email)->get();
        $data = User::where('email', $email)->first();

        $data->govtid_number = json_encode(array(
            'type' => request('govtid_type'),
            'no' => request('govtid_number')
        ));

        $data->region = "National Capital Region (NCR)";
        $data->address = request('address');
        $data->birthday = request('birthday');


        $data->save();

        Auth::logout();
        return redirect()->route("store")->with('success', 'Your Registration Has Been Succesful. Please wait while we verify your account. ABout 1 - 3 days');
    }

    protected function verify()
    {

        return view('auth.cpverify');
    }

    public function getcode()
    {
        // dd(request('cp_number'));
        request()->validate([
            'cp_number' => 'required',
        ]);

        $nexmo = app('Nexmo\Client');
        try {
            $verification = $nexmo->verify()->start([
                'number' => request('cp_number'),
                'brand'  => 'Plantify',
                'code_length'  => '6'
            ]);
            $id = $verification->getRequestId();
            request()->session()->put('nexmoID', $id);
            request()->session()->put('cptemp', request('cp_number'));
        } catch (Exception $e) {
            return redirect()->route('OTP.verifycheck')->withErrors(['mes' => 'it seem you already inputted this number and awaiting a code']);
        }

        return redirect()->route('OTP.verifycheck');
    }

    protected function entercode()
    {
        return view('auth.cpcheck');
    }


    public function checkcode()
    {

        request()->validate([
            'code' => 'required',
        ]);
        $nexmo = app('Nexmo\Client');
        $request_id = request()->session()->get('nexmoID');
        $verification = new Verification($request_id);
        try {
            $result = $nexmo->verify()->check($verification, request('code'));
        } catch (Exception $e) //sadasdasdadsasa

        {
            return redirect()->back()->withErrors(['mes' => 'Incorrect Code submitted']);
        }

        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $data->cp_number = request()->session()->get('cptemp');
        $data->otp_verified = 1;
        $data->save();

        return redirect()->route('store')->with('success', 'successfully verified the cell phone number');
    }

    public function cancelcode()
    {


        $nexmo = app('Nexmo\Client');
        $request_id = request()->session()->get('nexmoID');

        try {
            $result = $nexmo->verify()->cancel($request_id);
        } catch (Exception $e) {
            return redirect()->route('OTP.verify')->withErrors(['mes' => ' your code has expired or cancelled']);
        }

        return redirect()->route('OTP.verify');
    }

    public function profile()
    {

        $profile = User::where('email', Auth::user()->email)->first();
        $app = Retailer_application::latest()->where('user_id', Auth::user()->id)->first();

        return view('customer.settings.profile.profile', ['profile' => $profile, 'app' => $app]);
    }

    public function editprofile()
    {
        $profile = User::where('email', Auth::user()->email)->first();

        return view('customer.settings.profile.edit', ['profile' => $profile]);
    }

    public function updateprofile(UserRequest $request)
    {

        $data = User::where('email', Auth::user()->email)->first();

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->name = request('first_name') . ' ' . request('last_name');
        $data->govtid_number = json_encode(array(
            'type' => request('govtid_type'),
            'no' => request('govtid_number')
        ));
        $data->region = "National Capital Region (NCR)";
        $data->address = request('address');
        $data->birthday = $request->birthday;

        $data->save();

        LogServices::log('update user profile');

        return redirect()->route('customer.profile.show')->with('success', 'successfully updated profile');
    }

    // OTP VERSION FOR PROFILE -------------------------------------------------------------------


    protected function pverify()
    {

        return view('customer.settings.profile.cpverify');
    }

    public function pgetcode()
    {


        request()->validate([
            'cp_number' => 'required'
        ]);

        $nexmo = app('Nexmo\Client');
        try {
            $verification = $nexmo->verify()->start([
                'number' => request('cp_number'),
                'brand'  => 'Plantify',
                'code_length'  => '6'
            ]);
            $id = $verification->getRequestId();
            request()->session()->put('nexmoID', $id);
            request()->session()->put('cptemp', request('cp_number'));
        } catch (Exception $e) {
            return redirect()->route('customer.profile.pentercode')->withErrors(['mes' => 'it seem you already inputted this number and awaiting a code']);
        }
        return redirect()->route('customer.profile.pentercode');
    }

    protected function pentercode()
    {
        return view('customer.settings.profile.cpcheck');
    }


    public function pcheckcode()
    {

        request()->validate([
            'code' => 'required',
        ]);
        $nexmo = app('Nexmo\Client');
        $request_id = request()->session()->get('nexmoID');
        $verification = new Verification($request_id);
        try {
            $result = $nexmo->verify()->check($verification, request('code'));
        } catch (Exception $e) //sadasdasdadsasa

        {
            return redirect()->back()->withErrors(['mes' => 'Incorrect Code submitted']);
        }

        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $data->cp_number = request()->session()->get('cptemp');
        $data->otp_verified = 1;
        $data->save();

        return redirect()->route('customer.profile.show')->with('success', 'successfully verified the cell phone number');
    }

    public function pcancelcode()
    {


        $nexmo = app('Nexmo\Client');
        $request_id = request()->session()->get('nexmoID');

        try {
            $result = $nexmo->verify()->cancel($request_id);
        } catch (Exception $e) {
            return redirect()->route('customer.profile.pverify')->withErrors(['mes' => ' your code has expired or cancelled']);
        }

        return redirect()->route('customer.profile.pverify');
    }


    protected function verifyProfile($id)
    {

        $user = User::find($id);
        $user->user_stateid = 1;
        $user->save();
        Mail::to($user->email)->send(new AccountActivate());
        return redirect()->route('admin.user.index')->with('success', 'Successfullly Activated User Account of ' . $user->email ) ;
        
    }
}
