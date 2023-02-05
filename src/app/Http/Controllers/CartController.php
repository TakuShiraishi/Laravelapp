<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }
    public function index() {
        $auth_id = Auth::id();
        $carts = Cart::where('user_id', $auth_id)->get();
        $subtotals = $this->subtotals($carts);
        $totals = $this->totals($carts);
        return view('carts.index', compact('carts', 'totals', 'subtotals'));
    }
    private function subtotals($carts) {
        $result = 0;
        foreach ($carts as $cart) {
            $result += $cart->subtotal();
        }
        return $result;
    }
    
    private function totals($carts) {
        $result = $this->subtotals($carts) + $this->tax($carts);
        return $result;
    }
    
    private function tax($carts) {
        $result = floor($this->subtotals($carts) * 0.1);
        return $result;
    }
    
    public function add(Request $request) {
        $item_id = $request->input('item_id');
        if ($this->cart->insert($item_id, 1)) {
            return redirect(route('cart.index'))->with('true_message', '商品をカートに入れました。');
        } else {
            return redirect(route('cart.index'))->with('false_message', '在庫が足りません。');
        }
    }
}