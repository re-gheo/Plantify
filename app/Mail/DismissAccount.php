<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DismissAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdata, $remark)
    {
        $this->uses = $userdata;
        $this->remark = $remark;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $user = $this->uses;
        $remark = $this->remark;
        return $this->markdown('email.account.dismiss', compact('user', 'remark'));
    }
}
