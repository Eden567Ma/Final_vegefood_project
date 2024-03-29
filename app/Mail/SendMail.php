<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Cart;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;
      public $orders;
      public $cart;
      
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders)
    {
       $this->orders = $orders;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('l3projetihm@gmail.com')->subject('Produits achetés')->view('mail.facture')->with('orders', $this->orders);
    }
}
