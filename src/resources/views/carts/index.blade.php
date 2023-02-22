@extends('layouts.app')
@section('content')
@if (0 < $carts->count())
<div class="container pb-5">
  <div class="card text-center">
    <div class="card-header">
      <h4>カート内容</h4>
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
                  <li class="list-group-item"><form  action="/cart/{{$cart->id}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="delete">
                  <a><input type="submit" name="" value="削除" class="btn btn-danger"></a></li>
                </ul>
              </div>
            </div>
            @endforeach
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>合計:</strong>{{ $subtotals }}</li>
                    <li class="list-group-item"><strong>税込:</strong>{{ $totals }}</li>
                </ul>
                    <li class="list-group-item"><a href="/cart/{{$cart->id}}">購入確定画面に進む</a></li>
                    @else
                    <h1>カートに商品はありません</h1>
                    @endif
            <a href="{{ route('items.index') }}">商品一覧へ戻る</a></h2>
          </div>
      </div>
  </div>
</div>
@endsection