@extends('admin-main')

@section('page-title')
	Admin Login
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-centered ">
				<div class="panel panel-default almuni-default">
				  <div class="panel-body almuni-header">
				    Admin Login
				  </div>
				  <form method="post">
					  <div class="panel-footer">	
							<div class="form-group">
								<label>Email Address</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>						
							<div class="text-center">
								<button type="submit" class="btn btn-almuni">Login</button>
							</div>
					  </div>
				  {{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
	</div>
@stop