<html>
	<head>
	
    <!-- Javascript -->
  <style type="text/css">
#defaultCountdown { width: 300px; height: 45px; }
</style>
	<script type="text/javascript">
         var base_url = "{{route('home')}}";
        </script>
		
    {{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('styles/custom-styles.css')}}
    {{HTML::style('css/jquery.countdown.css')}}
	</head>
	<body>
	<header>
	
	</header>
	<div id="fb-root"></div>
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
	 <ul class="nav navbar-nav" id="main-nav">
        <li class="active" id="home"><a href="#/">Home <span class="sr-only">(current)</span></a></li>
        <li id="all-products"><a href="#/all-products">All Products</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            @foreach($categories as $category)
				      <li><a href="#/category/{{ $category->id }}" value="{{$category->id}}">{{$category->name}}</a></li>
			      @endforeach
          </ul>
        </li>
        <li id="create-product"><a href="#/create-product">Create Product</a></li>
        @if(!Auth::check())
          <li id="register"><a href="#/register">Register</a></li>
          <li id="login"><a href="#/login">Login</a></li>
        @else
          <li id="logout"><a href="#/logout">Logout</a></li>
        @endif
	  </ul>
    <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          @if (Auth::user()->is_admin == 1)
            <li id="close-products"><a href="#/close-products">Close products</a></li>
          @endif
          <li id="user-info"><a href="#/profile/{{$user->id}}">Your Account</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
	
	<div id="content">
	  <div id="content-change">
		  @yield('main')
		</div>
  </div>

<!--footer-->
<div id="footer" class="panel-footer">
 <div class="container">
    <div></div>
    <div></div>
    <div data-ss-colspan="2">Something</div>
    <div data-ss-colspan="2"></div>
    <div data-ss-colspan="3"></div>
	<div class="fb-like" data-href="https://www.facebook.com/SingaporeAuction" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	<div class="fb-share-button" data-href="http://singapore-sling.dev/" data-layout="button_count"></div>
  </div>
</div>
<!--/footer-->

    {{-- scripts should be at the bottom of the page --}}
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
	{{ HTML::script('js/jquery-ui.min.js') }}
	{{ HTML::script('js/jquery.shapeshift.js') }}
    {{ HTML::script('js/kendo.all.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/sammy.js') }}
    {{ HTML::script('js/someScript.js') }}
    {{ HTML::script('js/routing/routes.js') }}
    {{ HTML::script('js/facebook-plugins.js') }}
	{{ HTML::script('js/jquery.countdown.js') }}
    @yield('scripts')

    <script>
      $(document).ready(function() {
        $(".container").shapeshift({
          minColumns: 3
        });
      })
    </script>
	
	</body>
</html>