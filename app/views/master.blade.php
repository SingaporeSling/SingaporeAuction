<html>
	<head>
	<script type="text/javascript">
         var base_url = "{{route('home')}}";
        </script>
	</head>
	<body>
		@yield('main')
		{{ HTML::script('js/jquery-2.1.4.min.js') }}
		{{ HTML::script('js/someScript.js') }}
		@yield('scripts')

		<!--@yield('styles')-->
	</body>
</html>