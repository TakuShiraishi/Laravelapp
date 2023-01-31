@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-8 col-lg-6 px-6 px-sm-0 mx-auto">
      <div class="card text-center">
        <div class="card-header">
          <h4>投稿画面</h4>
        </div>
          <div class="card-body">
            <form action="/items" method="POST"  enctype='multipart/form-data' >
              @csrf 
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><label for="name" class="col-md-2 col-form-label text-md-right">商品名</label>
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                </li>
                <li class="list-group-item"><label for="price" class="col-md-2 col-form-label text-md-right">値段</label>
                  <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">
                </li>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><label for="description" class="col-md-2 col-form-label text-md-right">商品紹介</label>
                  <textarea name="description" id="description" style="resize: none; height: 200px; width: 100%">{{ old('description') }}</textarea>
                </li>
                <li class="list-group-item"><button type="submit" class="btn btn-primary ml-3" name='action' value='add'>
                        投稿
                    </button>
                </li>
              </ul>
                </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </form>
    </div>
  </div>
@endsection