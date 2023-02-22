@extends('layouts.app')

@section('content')
<div class="container pb-5">
  <div class="card text-center">
    <div class="card-header">
      <h4>商品一覧</h4>
    </div>
      <div class="card-body mb-6">
        <div class="row">
          <form action="{{ route('items.index') }}" method="GET" enctype="multipart/form-data">
            <input type="text" name="keyword" value="{{ $keyword }} ">
            <input type="submit" value="検索" >
          </form>
          @foreach($items as $item)
          <div class="col-12 col-sm-3 col-md-3 mb-3">
              <div class="card border-dark " >
                <div class="card-header">
                  <h4>{{$item->name}}</h4>
                </div>
                  <ul class="list-group list-group-flush">
                  <img src="{{ asset('/storage/images/'.$item['image']) }}" class='w-100 mb-3'/>
                    <li class="list-group-item"><strong>値段:</strong>{{$item->price}}</li>
                    <li class="list-group-item"><strong>商品説明:</strong>{{$item->description}}</li>
                    <li class="list-group-item"><a href="/items/{{$item->id}}"><button type="button" class="btn btn-primary">詳細ページへ</button></a></li>
                  </ul>
              </div>
            </div>
            @endforeach
          </div>
      </div>
    </div>
  </div>
</div>
@endsection