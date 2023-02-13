<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Jobs\SendThanksMail;
use App\Mail\ThanksMail;


class CartController extends Controller
{
    public function __construct(Cart $cart) {
        $this->cart = $cart;
        $this->middleware('auth');
    }
    public function index() {
        $auth_id = Auth::id();
        $carts = Cart::where('user_id', $auth_id)->get();
        $subtotals = $this->subtotals($carts);
        $totals = $this->totals($carts);
        return view('carts.index', compact('carts', 'totals', 'subtotals'));
    }
    public function store(Request $request)
    {
        $cart = Cart::where('user_id',Auth::id())->where('item_id',$request->item_id)->first();
        // カートに商品があるか確認
        if($cart) {
            $cart->quantity += $request->quantity;
            // あれば数量追加
            $cart->save();
        } else {
            // なければ新規作成
            $cart = new Cart;
            $cart->item_id = $request->item_id;
            $cart->user_id = Auth::id();
            $cart->quantity = $request->quantity;
            $cart->save();    
        }
        return redirect()->route('cart.index');
    }

    private function subtotals($carts) {
        $result = 0;
        foreach ($carts as $cart) {
            $result += $cart->subtotal();
        }
        return $result;
    }

    public function show($id)
    {
        $auth_id = Auth::id();
        $carts = Cart::where('user_id', $auth_id)->get();
        $subtotals = $this->subtotals($carts);
        $totals = $this->totals($carts);
        return view('carts.show', compact('carts', 'totals', 'subtotals'));
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

    public function destroy($id) {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $user = User::findOrFail(Auth::id());
        $carts = Cart::where('user_id',Auth::id())->get();
        $subtotals = $this->subtotals($carts);
        $totals = $this->totals($carts);
        SendThanksMail::dispatch($carts, $user,$subtotals,$totals);
        Cart::where('user_id', Auth::id())->delete();
        return view('carts.checkout');
    }
}