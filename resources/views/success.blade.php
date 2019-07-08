@extends('main')

@section('content')
	<div class="container">
	  <div class="jumbotron">
	    <h1>Registration</h1> 
	    <p>Conngratulations! You have successfully registered. Your registration is currently under review and therefore will not be visible in the website.</p> 
	  </div>
	  <p>If you want to change your details, Please login with your email and password</p>
	    	<a href="{{ route('alumini-login-get') }}" class="btn btn-info btn-flat">Login</a>
	</div>
@stop