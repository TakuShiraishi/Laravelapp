@extends('layouts.app')

@section('content')
<body>
        <table>
        <form action="/carts" method="POST"  enctype= "multipart/form-data" >
                <h1>カート内容</h1>
                        <tr style="background-color:#f5f5f5">
                        <li class="list-group-item"><label for="name" class="col-md-2 col-form-label text-md-right">商品名</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                        <li class="list-group-item"><label for="price" class="col-md-2 col-form-label text-md-right">購入数</label>
                        <input id="price" type="text" class="form-control" name="price" value="{{ old('quantity') }}">
                        </li>

                        <li class="list-group-item">
                        カートに入れる</li>
                        
<br>
<h2><a href="{{ route('items.index') }}">商品一覧</a></h2>
</body>
@endsection