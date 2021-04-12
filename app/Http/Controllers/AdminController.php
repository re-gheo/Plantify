<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Commission;
use App\Models\Order;
use App\Models\Order_bystoreitem;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


use Session;

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
        $users = User::get();

        $orders_bystore = Order_bystoreitem::get();

        $orders = Order::get();

        $admins = $users->where('user_role','admin');

        $retailers = $users->where('user_role','retailer');

        $customers = $users->where('user_role','customer');

        $commission = $this->computeCommissionEarned($orders_bystore);


        return view('admin.index', compact('admins','retailers', 'customers', 'commission', 'orders', 'orders_bystore'));
    }

    public function computeCommissionEarned($orders){

        $total = 0;

        foreach ($orders as $order){
            $total += $order->product->commissionEarned * $order->order_quantity;
        }

        return $total;
    }

    public function index_list()
    {
        $admins = User::where('user_role', 'admin')->get();

        return view('admin.accountManagement.admin.index', compact('admins'));
    }

    public function store(CreateAdminRequest $request){

        User::create([
            'email' => $request->email,
            'password' => Hash::make("plantifyadminpassword"),
            'user_role' => 'admin',
            'first_name' => $request->fn,
            'last_name' => $request->ln,
            'name' => $request->fn." ".$request->ln,
        ]);

        Session::flash('success', 'Succesfully Created Admin User');
        return redirect()->back();
    }

    public function delete($id){

        $user= User::findOrFail($id)->delete();

        Session::flash('success', 'Succesfully Deleted User');
        return redirect()->back();
    }

    public function edit_admin($id){

        $admin = User::findOrFail($id);

        return view('admin.accountManagement.admin.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, $id){

        User::findOrFail($id)->update([
            'email' => $request->email,
            'first_name' => $request->fn,
            'last_name' => $request->ln,
            'name' => $request->fn." ".$request->ln,
        ]);

        Session::flash('success', 'Succesfully Updated Admin User');
        return redirect()->back();
    }

    public function ban(Request $request, $id){
        $user= User::findOrFail($id);

        $user->update([
            'user_stateid' => 2,
            'remarks' => $request->remarks
        ]);

        Session::flash('success', 'Succesfully Banned User');
        return redirect()->back();
    }

    public function unban($id){
        User::findOrFail($id)->update([
            'user_stateid' => 1,
            'remarks' => ""
        ]);

        Session::flash('success', 'Succesfully Unbanned User');
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
