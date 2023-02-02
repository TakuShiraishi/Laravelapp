@extends('layouts.app')
@section('content')
<body>
        <table>
                <h1>カート一覧ページ</h1>
                <tr style="background-color:#e3f0fb">
                        <th>商品名</th>
                        <th>購入数</th>
                </tr>
                        <tr style="background-color:#f5f5f5">
                        <td align="right">{{ $cart->item->name }}</td>
                        <td align="right">{{ $cart->quantity }}</td>
                        <button type="submit">削除</button>
                        </form></td></tr>
                <td style="background-color:#f5f5f5">
                        <td>合計</td＞
                </td>
        </table>
<br>
<h2><a href="{{ route('items.index') }}">商品一覧へ戻る</a></h2>
</body>
@endsection