@extends('master')

@section('main')
<form id="register_form" action="/save-user" method="post">
   <label for="first_name">First Name</label>
   <input type="text" name="first_name" id="first_name" />
   <div class="error first_name"></div>

   <label for="last_name">Last Name</label>
   <input type="text" name="last_name" id="last_name" />
   <div class="error last_name"></div>

   <label for="email">Email</label>
   <input type="text" name="email" id="email" />
   <div class="error email"></div>

   <label for="password">Password</label>
   <input type="password" name="password" id="password" />
   <div class="error password"></div>

   <label for="password_confirmation">Confirm Password</label>
   <input type="password" name="password_confirmation" id="password_confirmation" />

   <input type="submit" value="Submit" />
</form>


<!--TODO move the style -->
  <style type="text/css">
   label{display: block;}
  </style>
@stop