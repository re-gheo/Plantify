<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
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
       

        return redirect ('/');
    }
}
