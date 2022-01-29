@extends('layout')
@section('title','商品一覧')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>商品一覧</h2>
      @if (session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg')}}
        </p>
      @endif  

      <table class="table table-striped">
          <tr>
              <th>商品番号</th>
              <th>商品名</th>
              <th>日付</th>
              <th></th>
              
              
              
          </tr>
          @foreach( $products as $product )
       
          <tr>
              <td>{{ $product->id  }}</td>
              <td><a href="/product/{{ $product->id }}">{{ $product->product_name }}</a></td>
              <td>{{ $product->updated_at }}</td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='/product/edit/{{ $product->id }}'">編集</button></td>

          </tr>
          @endforeach
      </table>
  </div>
</div>

@endsection