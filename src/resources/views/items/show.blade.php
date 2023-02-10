@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-8 col-lg-8 px-8 px-sm-0 mx-auto">
      <div class="card text-center">
          <div class="card-header">
            <h2>{{$item->name}}</h2>
          </div>
          <form action="{{ url('/cart')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
          <ul class="list-group list-group-flush">
          <img src="{{ asset('/storage/images/'.$item['image']) }}" class='w-50 mb-3'/>
            <li class="list-group-item"><h5><strong>値段:</strong>¥{{$item->price}}</h5></li>
            <li class="list-group-item"><h5><strong>商品説明</strong></br>{{$item->description}}</li>
            <li class="list-group-item"><a href="/items/{{$item->id}}/edit"><button type="button" class="btn btn-primary">編集</button></a></li>
            <form action="/items/{{$item->id}}" method="POST">
            {{ csrf_field() }}
            <li class="list-group-item"><input type="hidden" name="_method" value="delete">
            <a><input type="submit" name="" value="削除" class="btn btn-danger"></a>
            </form>
          </ul>
          <form action="/cart" method="POST" class="item-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="name" value="{{$item->name}}">
            <input type="hidden" name="price" value="{{$item->price}}">
            <input type="text" value="1" name="quantity" >
            <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
          </form>
              @endsection
      </div>
    </div>
  </div>
</div>
  