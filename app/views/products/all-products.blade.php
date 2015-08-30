@extends('master')

@section('main')
  <div id="successful_bid">
  @if(Session::has('message'))
  {{Session::get('message')}}
  <?php Session::forget('message') ?>
  @endif
  </div>
  <ul>
  @foreach($products as $product)
  <li>{{$product->product_name}}</li>
  <li>{{$product->description}}</li>
  <li>{{$product->start_price}}</li>
  @if (File::exists(public_path() . '/product_images/product_'.$product->id.'_0.jpg'))
  <li><img width="200" src="{{asset('product_images/product_'.$product->id.'_0.jpg')}}" /></li>
  @endif
  <li><a href="{{action('ProductsController@viewProduct', $product->id)}}">Bid</a></li>
  @endforeach
  </ul>
@stop