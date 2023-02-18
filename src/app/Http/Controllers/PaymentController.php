<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\Models\Cart;
use App\Models\User;
class PaymentController extends Controller
{
    public function payment(Request $request){
        Stripe::setApiKey(config('app.STRIPE_SECRET'));
        // Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー
        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
        return back();
    }
}
