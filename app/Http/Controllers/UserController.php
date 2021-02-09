<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use Vonage\Verify\Client;
use Nexmo\Laravel\Facade\Nexmo;
use Vonage\Verify\Verification;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->get();   
        return view('admin.accountManagement.useraccounts',['users' => $user]);  
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

    protected function setup(){
       
        return view('auth.setup');  
    }
    public function setups($email)
    {
          
        request()->session()->put('emailtemp', $email);
        request()->validate([
            'govtid_number' => 'required',
            'address' => 'required',
            'birthday' => 'required'
        ]);
            
       // $data = DB::table('users')->where('email', '=',$email)->get();
        $data = User::where('email',$email )->first();
       
        $data->govtid_number = request('govtid_number');
        $data->region = "National Capital Region (NCR)";
        $data->address = request('address');
        $data->birthday = request('birthday');    

        
        $data->save();   
       

        return redirect ('/verify');
    }

    protected function verify(){
       
        return view('auth.cpverify');  
    }

    public function getcode()
    {
      // dd(request('cp_number'));
        request()->validate([
            'cp_number' => 'required',    
        ]);

    $nexmo = app('Nexmo\Client');

    $verification = $nexmo->verify()->start([ 
        'number' => request('cp_number'),
        'brand'  => 'Plantify',
         'code_length'  => '6'
         ]);
         $id = $verification->getRequestId();
        request()->session()->put('nexmoID', $id);
        request()->session()->put('cptemp', request('cp_number'));
        return redirect ('/verify/check');
        
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
        try{
            $result = $nexmo->verify()->check($verification, request('code'));
            }
         catch (Exception $e)//sadasdasdadsasa
         
            {
            return redirect()->back()->withErrors(['mes' => 'Incorrect Code submitted']);
            }
       
        $email = request()->session()->get('emailtemp');
        $data = User::where('email',$email )->first();
        $data->cp_number = request()->session()->get('cptemp');
        $data->otp_verified = 1;
        $data->save(); 
       

        
    //     $data->save();   
       

        return redirect ('/')->with('success', 'successfully verified the cell phone number');
    } 
    
    public function cancelcode()
    {
        
      
        $nexmo = app('Nexmo\Client');
        $request_id = request()->session()->get('nexmoID');
      
        try {
            $result = $nexmo->verify()->cancel('REQUEST_ID');
        }
        catch(Exception $e) {
            return redirect('/verify')->withErrors(['mes' => 'Invalid call: either your code has expired or it doesnt exist  ']);
        }

        return redirect ('/verify');
    }


}
