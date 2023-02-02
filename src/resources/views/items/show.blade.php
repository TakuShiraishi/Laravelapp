@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-8 col-lg-8 px-8 px-sm-0 mx-auto">
      <div class="card text-center">
          <div class="card-header">
            <h2>{{$item->name}}</h2>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><h5><strong>値段:</strong>¥{{$item->price}}</h5></li>
            <li class="list-group-item"><h5><strong>商品説明</strong></br>{{$item->description}}</li>
            <li class="list-group-item"><a href="/items/{{$item->id}}/edit"><button type="button" class="btn btn-primary">編集</button></a></li>
            <form action="/items/{{$item->id}}" method="POST">
            {{ csrf_field() }}
            <li class="list-group-item"><input type="hidden" name="_method" value="delete">
            <input type="submit" name="" value="削除" class="btn btn-danger"><li>
            </form>
            <li class="list-group-item"><a href="/items"><button type="button" class="btn btn-info">一覧ページに戻る</button></a></li>
            <li class="list-group-item">カートに入れる</a></li>
          </ul>
              @endsection
          </div>
      </div>
  </div>
</div>
  