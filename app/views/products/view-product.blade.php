@extends('master')

@section('main')
  <h1>{{$product->product_name}}</h1>
  <p>{{$product->description}}</p>
  <span>{{$product->start_price}}</span>
  <p>Highest bid price is <span id="highest-bid">{{$highest_bid}}</span></p>
  <form action="/save-bid" method="post" id="bid_form">
  <input type="hidden" name="product_id" value="{{$product->id}}"/>
  <input type="text" name="bid" id="bid" />
  <div class="error bid"></div>
  <input type="submit" value="bid" />
  </form>

 
  @foreach($files as $file)
   @if (File::exists(public_path() . '/product_images/'.$file))
  <img width="300" src="{{asset('product_images/'.$file)}}" />
  @endif
  @endforeach
  
@stop