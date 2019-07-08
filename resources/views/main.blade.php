<!DOCTYPE html>
<html>
<head>
	<title>@yield('page-title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		@if(\Session::has('success-msg'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<p>{{ \Session::get('success-msg') }}</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@if(\Session::has('error-msg'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<p>{{ \Session::get('error-msg') }}</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@if(\Session::has('warning-msg'))
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<p>{{ \Session::get('warning-msg') }}</p>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
	</div>
	<div class="container">
		<br/>
		<div class="content">
			@yield('content')
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>