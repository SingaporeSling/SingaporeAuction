@extends('master')

@section('main')
<form id="login_form" action="/login-user" method="post">
   <label for="email">Email</label>
   <input type="text" name="email" id="email" />

   <label for="password">Password</label>
   <input type="password" name="password" id="password" />
   <div class="error"></div>

   <input type="submit" value="Submit" />
</form>


<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
  </style>
@stop