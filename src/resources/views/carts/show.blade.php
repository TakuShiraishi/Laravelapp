@extends('layouts.app')
@section('content')
<div class="container pb-5">
  <div class="card text-center">
    <div class="card-header">
      <h4>購入確定画面</h4>
    </div>
      <div class="card-body mb-6">
        <div class="row">
        @foreach ($carts as $cart)
          <div class="col-12 col-sm-3 col-md-3 mb-3">
              <div class="card border-dark " >
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>商品名:</strong>{{ $cart->item->name }}</li>
                  <li class="list-group-item"><strong>購入数:</strong>{{ $cart->quantity }}</li>
                  <li class="list-group-item"><strong>価格:</strong>{{ $cart->subtotal() }}</li>
                </ul>
              </div>
            </div>
            @endforeach
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>合計:</strong>{{ $subtotals }}</li>
                  <li class="list-group-item"><strong>税込:</strong>{{ $totals }}</li>
                  <li class="list-group-item">
                  <form action="{{ asset('payment') }}" method="POST">
                  {{ csrf_field() }}
                  <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="{{ config('app.STRIPE_KEY') }}"
                  data-amount="{{ $totals }}"
                  data-name="Stripe決済デモ"
                  data-label="購入確定"
                  data-description="これはデモ決済です"
                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                  data-locale="auto"
                  data-currency="JPY">
                  </script>
                  </li>
                </ul>
          </div>
          <h2><a href="{{ route('items.index') }}">商品一覧へ戻る</a></h2>
      </div>
  </div>
</div>
@endsection
