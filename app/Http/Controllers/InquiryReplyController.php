<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Session;

class InquiryReplyController extends Controller
{
        /**
     * Store a retailer reply in InquiryReply Table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Product $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
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
    public function update(Request $request, $id)
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
