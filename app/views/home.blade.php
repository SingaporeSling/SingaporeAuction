@extends('master')

@section('main')
<div id="root">
  <h1>Welcome!</h1>

  <form id="logout-form" action="/logout" method="post">
  <input type="submit" value="logout" id="logout" />
  </form>
  <div class="error logout-fail"></div>
  
  <span id="greeting">Hello, {{$user->first_name}}</span>
  </div>
@stop