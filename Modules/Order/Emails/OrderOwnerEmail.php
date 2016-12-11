<?php

namespace Modules\Order\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderOwnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $name, $comment, $product, $pType, $quantity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$comment, $product, $pType, $quantity)
    {
        $this->email = $email;
        $this->name = $name;
        $this->comment = $comment;
        $this->product = $product;
        $this->pType = $pType;
        $this->quantity = $quantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.orderOwner');
    }
}
