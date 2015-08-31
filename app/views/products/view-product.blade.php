@extends('master')

@section('main')
  <h1>{{$product->product_name}}</h1>
  <p>{{$product->description}}</p>
  <span>{{$product->start_price}}</span>
  @foreach($files as $file)
  <img width="300" src="{{asset('product_images/'.$file)}}" />
  @endforeach
@stop