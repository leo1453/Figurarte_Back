<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;

    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Recibo de tu compra - Figurarte')
                    ->view('emails.receipt')
                    ->with([
                        'user' => $this->user,
                        'order' => $this->order,
                    ]);
    }
}
