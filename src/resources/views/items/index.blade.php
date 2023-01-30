@extends('layouts.app')

@section('content')
<div class="container pb-5">
  <div class="card text-center">
    <div class="card-header">
      <h4>商品一覧</h4>
    </div>
      <div class="card-body">
        <div class="row">
          <form action="{{ route('items.index') }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
          </form>
          @foreach($items as $item)
          <div class="col-12 col-sm-6 col-md-4 mb-3">
              <div class="card">
                <div class="card-header">
                  <h1>{{$item->name}}</h1>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>商品ID</strong>{{$item->id}}</li>
                    <li class="list-group-item"><strong>値段</strong>{{$item->price}}</li>
                    <li class="list-group-item"><strong>商品説明</strong>{{$item->description}}</li>
                    <li class="list-group-item"><a href="/items/{{$item->id}}">詳細ページ</a></li>
                  </ul>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </div>
</div>
@endsection