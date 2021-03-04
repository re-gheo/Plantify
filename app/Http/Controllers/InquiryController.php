<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class InquiryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request,
     * @param Product $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //fix for update
        $product = Product::findOrFail($id);
        $product->inquiry()->create([
            'rater_id' => Auth::id(),
            'inquiry' => $request->inquiry,
        ]);

         //fix for message based on frontend
        Session::flash('success', 'Succesfully Commented');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       Inquiry::findOrFail($id)->delete();

       //fix for message based on frontend
       Session::flash('success', 'This message have been removed');

       return redirect()->back();
    }

    /**
     * Store a retailer reply in InquiryReply Table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Product $id
     * @return \Illuminate\Http\Response
     */
    public function storeRetailerReply(Request $request, $id)
    {
        //fix for update
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->inquiryreply()->create([
            'reply' => $request->inquiry,
        ]);

          //fix for message based on frontend
          Session::flash('success', 'Succesfully Replied');

        return redirect()->back();
    }

     /**
     * Store a retailer reply in InquiryReply Table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Product $id
     * @return \Illuminate\Http\Response
     */
    public function editRetailerReply(Request $request, $id)
    {
        //fix for update
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->inquiryreply()->update([
            'reply' => $request->inquiry,
        ]);

          //fix for message based on frontend
          Session::flash('success', 'Succesfully Updated');

        return redirect()->back();
    }
}
