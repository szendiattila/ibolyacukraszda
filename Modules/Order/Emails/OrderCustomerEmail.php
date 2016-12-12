<?php

namespace Modules\Order\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCustomerEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $email, $name, $comment, $product, $pType, $quantity, $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$comment, $product, $pType, $quantity, $amount)
    {
        $this->email = $email;
        $this->name = $name;
        $this->comment = $comment;
        $this->product = $product;
        $this->pType = $pType;
        $this->quantity = $quantity;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('order::mail.orderCustomer')->from('csaccount04@gmail.com')->subject('Rendelés az Ibolya cukrászdából');
    }
}
