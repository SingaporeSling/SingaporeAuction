<html>
	<head>
	
	<script type="text/javascript">
         var base_url = "{{route('home')}}";
        </script>
		
    {{HTML::style('css/bootstrap.min.css')}}
		{{HTML::style('styles/custom-styles.css')}}
		
	</head>
	<body>
	<header>
	
	</header>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#/">Singapore Sling</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav main-nav">
        <li class="active"><a href="#/">Home <span class="sr-only">(current)</span></a></li>
        <li id="all-products"><a href="#">All Products</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        @if(!Auth::check())
          <li id="register"><a href="#/register">Register</a></li>
          <li id="login"><a href="#/login">Login</a></li>
        @else
          <li id="logout"><a href="#/logout">Logout</a></li>
        @endif
	  </ul>
    <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li id="user-info"><a href="#">Your Account</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
	<div id="content-change">
		@yield('main')
		</div>
<div id="footer" class="panel-footer"><!--footer-->
  <div class="footer-links">
      	<div class="row">
          <ul class="list-unstyled">
            <li class="col-sm-4 col-xs-6">
              <a href="#">About</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">Services</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">Studies</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">References</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">Login</a>
            </li>
           <li class="col-sm-4 col-xs-6">
              <a href="#">Press</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">Contact</a>
            </li>
            <li class="col-sm-4 col-xs-6">
              <a href="#">Impressum</a>
            </li>
          </ul>
		</div><!--/row-->

  </div><!--/container-->
</div><!--/footer-->

    {{-- scripts should be at the bottom of the page --}}
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/sammy.js') }}
    {{ HTML::script('js/someScript.js') }}
    {{ HTML::script('js/routing/routes.js') }}
    
    @yield('scripts')

	</body>
</html>