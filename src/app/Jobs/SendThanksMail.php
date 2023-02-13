<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\ThanksMail;


class SendThanksMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to('test@example.com')->send(new TestMail());
        Mail::to($this->user)->send(new ThanksMail($this->carts,$this->user, $this->subtotals,$this->totals));
    }
}
