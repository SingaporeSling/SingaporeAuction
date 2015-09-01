@extends('master')

@section('main')
	<h1>Thank you for your registration!</h1>
@stop

@section('scripts')
<script>
	$(document).ready(function(){
		setTimeout(function(){
    		window.location.href = base_url;
		}, 4000);
	});
	</script>
@stop