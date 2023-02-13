@extends('layouts.app')
@section('content')
<body>
        <table>
                <h1>購入確定ページ</h1>
                <tr style="background-color:#e3f0fb">
                        <th>商品名</th>
                        <th>購入数</th>
                        <th>価格</th>
                </tr>
                @foreach ($carts as $cart)
                        <tr style="background-color:#f5f5f5">
                        <td align="right">{{ $cart->item->name }}</td>
                        <td align="right">{{ $cart->quantity }}</td>
                        <td align="right">{{ $cart->subtotal() }}</td>
                        </form>
                        </tr>
                @endforeach
                <td style="background-color:#f5f5f5">
                        <td>合計</td>
                        <td>{{ $subtotals }}</td>
                        <td>税込: {{ $totals }}</td>
                </td>
        </table>
<br>
<h2><a href="{{ route('cart.checkout') }}">購入確定</a></h2>
<h2><a href="{{ route('items.index') }}">商品一覧へ戻る</a></h2>
<div>
</body>
@endsection