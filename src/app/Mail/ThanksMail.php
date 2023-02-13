<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $carts;
    public $user;
    public $subtotals;
    public $totals;

    public function __construct($carts, $user,$subtotals,$totals)
    {
        $this->carts = $carts;
        $this->user = $user;
        $this->subtotals = $subtotals;
        $this->totals = $totals;

    }


    public function build()
    {
        return $this->view('emails.thanks')
        ->subject('ご購入ありがとうございます');
    }
}
