<p class="mb-4">{{ $user->name }} 様</p>

<p class="mb-4">下記のご注文ありがとうございました。</p>

商品内容
@foreach($carts as $cart)
<ul class="mb-4">
  <li>商品名: {{ $cart->item->name }}</li>
  <li>商品個数: {{ $cart->quantity }}個</li>
  <li>小計: {{ $cart->subtotal() }}円</li>
</ul>
@endforeach
<td>合計 税込: {{ $totals }}円</td>

