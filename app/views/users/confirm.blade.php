@extends('master')

@section('main')
	<h1>You so gay!</h1>
	
@stop

@section('scripts')
<script>
	$(document).ready(function(){
		setTimeout(function(){
    		window.location.href = base_url + '/login';
		}, 4000);
	});
	</script>
@stop