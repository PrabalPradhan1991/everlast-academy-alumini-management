<!DOCTYPE html>
<html>
<head>
	<title>@yield('page-title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}?v=1">
	<script src="https://kit.fontawesome.com/2f2a3d961c.js"></script>
</head>
<body>
	<div class="container">
		@if(\Session::has('success-msg'))
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p>{{ \Session::get('success-msg') }}</p>
		</div>
		@endif
		@if(\Session::has('error-msg'))
		<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p>{{ \Session::get('error-msg') }}</p>
		</div>
		@endif
		@if(\Session::has('warning-msg'))
		<div class="alert alert-warning alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<p>{{ \Session::get('warning-msg') }}</p>
		</div>
		@endif
	</div>
	<nav class="navbar navbar-default everlast-bg">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Everlast Academy</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="#">Home</a></li>
	        <li><a href="{{ route('alumini-view-get') }}">Alumini</a></li>
	      
	      </ul>	

	      <ul class="nav navbar-nav navbar-right">
	      	@if(!\Auth::check())
	        <li><a href="{{ route('admin-login-get') }}">Login</a></li>
	        @else
	        	<li><a href="#" class="login">Logout</a></li>
	        	<form method="post" action="{{ route('admin-logout-post') }}" id="logout">
						{{ csrf_field() }}
				</form>
	        @endif
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="content">
			@yield('content')
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="">
	 $('.login').on('click', function(){
	 	 $("#logout").submit()
	 });
	</script>
</body>
</html>