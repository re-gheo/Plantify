<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product_name = $product->product_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('app.mail_address'))
                    ->subject('New Customer Review')
                    ->with([
                        'product' => $this->product_name,
                    ])
                    ->markdown('email.review.posted');


        // return $this->markdown('email.review.posted');
    }
}
