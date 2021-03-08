<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function ban($id){

        $user= User::findOrFail($id);

        $user->update([
            'user_stateid' => 2
        ]);

        return redirect()->back();
    }

    public function unban($id){
        User::findOrFail($id)->update([
            'user_stateid' => 1
        ]);

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
