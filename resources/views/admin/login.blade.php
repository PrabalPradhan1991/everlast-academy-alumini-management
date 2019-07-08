@extends('main')

@section('page-title')
	Admin Login
@stop

@section('content')
	
		<form method="post">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			{{ csrf_field() }}
			<input type="submit" value="Login">
		</form>
@stop