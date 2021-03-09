<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Inquiry;
use Illuminate\Http\Request;

use Session, Auth;

class CommentController extends Controller
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
        $inquiry->comments()->create([
            'comment' => $request->inquiry,
            'comment_userid' => Auth::id(),
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
        $comment = Comment::findOrFail($id);
        $comment->update([
            'comment' => $request->inquiry,
        ]);

          //fix for message based on frontend
          Session::flash('success', 'Succesfully Updated');

        return redirect()->back();
    }

    public function markAsBest($id){
        //fix for update
        $comment = Comment::findOrFail($id);
        $comment->update([
            'inquiryAnswer' => true,
        ]);

        //fix for message based on frontend
        Session::flash('success', 'Succesfully Updated');

        return redirect()->back();
    }
}
