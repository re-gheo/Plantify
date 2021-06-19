<?php

namespace App\Services;

use App\Models\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order_bystoreitem;


class AdminDataService
{
    


    public function getDataAdmin()
    {

        $all = [
            'order_bystoreitem' => $this->orderByItemAll(),
            'customer' => $this->customerAll(),
            'user' => $this->userAll(),

        ];
        return $all;
    }


    private function orderByItemAll()
    {
        $orderByItem = [
            'orderByItemAll' => Order_bystoreitem::all(),

            'orderByItemMonth' => Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get(),
            'orderByItem3Month' => Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(90))->get(),
            'orderByItemWeek' => Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get(),
            'orderByItemYear' => Order_bystoreitem::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get(),

            'noOforderByItemAll' => count(Order_bystoreitem::all()),
            'noOforderByItemMonth' => count(Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get()),
            'noOforderByItem3Month' => count(Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(90))->get()),
            'noOforderByItemWeek' => count(Order_bystoreitem::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get()),
            'noOforderByItemYear' => count(Order_bystoreitem::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get()),

            "orderByItemMonthS" => [ //array

                'Jan' => Order_bystoreitem::latest()->whereMonth('created_at','01')->get(),
                'Feb' => Order_bystoreitem::latest()->whereMonth('created_at','02')->get(),
                'Mar' => Order_bystoreitem::latest()->whereMonth('created_at','03')->get(),
                'Apr' => Order_bystoreitem::latest()->whereMonth('created_at','04')->get(),
                'May' => Order_bystoreitem::latest()->whereMonth('created_at','05')->get(),
                'Jun' => Order_bystoreitem::latest()->whereMonth('created_at','06')->get(),
                'Jul' => Order_bystoreitem::latest()->whereMonth('created_at','07')->get(),
                'Aug' => Order_bystoreitem::latest()->whereMonth('created_at','08')->get(),
                'Sep' => Order_bystoreitem::latest()->whereMonth('created_at','09')->get(),
                'Oct' => Order_bystoreitem::latest()->whereMonth('created_at','10')->get(),
                'Nov' => Order_bystoreitem::latest()->whereMonth('created_at','11')->get(),
                'Dec' => Order_bystoreitem::latest()->whereMonth('created_at','12')->get(),
            ],
            "orderByItemMonthCount" => [ //array
                'Jan' => count(Order_bystoreitem::latest()->whereMonth('created_at','01')->get()),
                'Feb' => count(Order_bystoreitem::latest()->whereMonth('created_at','02')->get()),
                'Mar' => count(Order_bystoreitem::latest()->whereMonth('created_at','03')->get()),
                'Apr' => count(Order_bystoreitem::latest()->whereMonth('created_at','04')->get()),
                'May' => count(Order_bystoreitem::latest()->whereMonth('created_at','05')->get()),
                'Jun' => count(Order_bystoreitem::latest()->whereMonth('created_at','06')->get()),
                'Jul' => count(Order_bystoreitem::latest()->whereMonth('created_at','07')->get()),
                'Aug' => count(Order_bystoreitem::latest()->whereMonth('created_at','08')->get()),
                'Sep' => count(Order_bystoreitem::latest()->whereMonth('created_at','09')->get()),
                'Oct' => count(Order_bystoreitem::latest()->whereMonth('created_at','10')->get()),
                'Nov' => count(Order_bystoreitem::latest()->whereMonth('created_at','11')->get()),
                'Dec' => count(Order_bystoreitem::latest()->whereMonth('created_at','12')->get()),
            ],
           
           
        ];
        return $orderByItem;
    }


    private function customerAll()
    {
        $customer = [
            'customerAll' => Customer::all(),

            'customerMonth' => Customer::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get(),
            'customerWeek' => Customer::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get(),
            'customerYear' => Customer::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get(),

            'noOfCustomerAll' => count(Customer::all()),
            'noOfCustomerMonth' => count(Customer::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get()),
            'noOfCustomerWeek' => count(Customer::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get()),
            'noOfCustomerYear' => count(Customer::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get()),
        ];
        return $customer;
    }


    private function userAll()
    {
        $user = [
            'userAll' => User::all(),
            'userMonth' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get(),
            'userWeek' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get(),
            'userYear' => User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get(),

            'noOfUserAll' => count(User::all()),
            'noOfUserMonth' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get()),
            'noOfUserWeek' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get()),
            'noOfUserYear' => count(User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get()),

            'AdminAll' => User::all()->where('user_role', 'admin'),
            'AdminMonth' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get()->where('user_role', 'admin'),
            'AdminWeek' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get()->where('user_role', 'admin'),
            'AdminYear' => User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get()->where('user_role', 'admin'),

            'noOfAdminAll' => count(User::all()->where('user_role', 'admin')),
            'noOfAdminMonth' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->where('user_role', 'admin')->get()),
            'noOfAdminWeek' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->where('user_role', 'admin')->get()),
            'noOfAdminYear' => count(User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->where('user_role', 'admin')->get()),

            'retailerAll' => User::all()->where('user_role', 'retailer'),
            'retailerMonth' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->where('user_role', 'retailer')->get(),
            'retailerWeek' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->where('user_role', 'retailer')->get(),
            'retailerYear' => User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->where('user_role', 'retailer')->get(),

            'noOfRetailerAll' => count(User::all()->where('user_role', 'retailer')),
            'noOfRetailerMonth' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->where('user_role', 'retailer')->get()),
            'noOfRetailerWeek' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->where('user_role', 'retailer')->get()),
            'noOfRetailerYear' => count(User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->where('user_role', 'retailer')->get()),

            'customerAll' => User::all()->where('user_role', 'customer'),
            'customerMonth' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->where('user_role', 'customer')->get(),
            'customerWeek' => User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->where('user_role', 'customer')->get(),
            'customerYear' => User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->where('user_role', 'customer')->get(),

            'noOfCustomerAll' => count(User::all()->where('user_role', 'customer')),
            'noOfCustomerMonth' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->where('user_role', 'customer')->get()),
            'noOfCustomerWeek' => count(User::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->where('user_role', 'customer')->get()),
            'noOfCustomerYear' => count(User::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->where('user_role', 'customer')->get()),


        ];
        return $user;
    }

    // private function adminAll() by level pala
    // {
    //     $admin = [
    //         'adminAll' => Admin::all(),

    //         'adminMonth' => Admin::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get(),
    //         'adminWeek' => Admin::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get(),
    //         'adminYear' => Admin::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get(),

    //         'noOfAdminAll' => count(Admin::all()),
    //         'noOfAdminMonth' => count(Admin::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(30))->get()),
    //         'noOfAdminWeek' => count(Admin::where('created_at', '>=', Carbon::now("Asia/Manila")->subDays(7))->get()),
    //         'noOfAdminYear' => count(Admin::where('created_at', '>=', Carbon::today("Asia/Manila")->subDays(365))->get()),
    //     ];
    //     return $admin;
    // }

  
}
