@extends('layout')
@section('title','商品詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{ $product->product_name }}</h2>
      <span>作成日 :{{ $product->created_at }}</span>
      <span>更新日 :{{ $product->updated_at }}</span>
      <p>{{ $product->content }}</p>
    
  </div>
</div>

@endsection