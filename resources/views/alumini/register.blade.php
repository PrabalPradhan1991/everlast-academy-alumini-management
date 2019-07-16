@extends('main')

@section('page-title')
	Alumini Register
@stop

@section('content')
<div class="container">
		<div class="row">
			<div class="col-sm-5 col-centered ">
				<div class="panel panel-default almuni-default">
				  <div class="panel-body almuni-header">
				    Register
				  </div>
				  <form method="post" class="pra_form_submit">
				  	  <input type="hidden" autocomplete="off">
					  <div class="panel-footer">	
							<div class="form-group">
								<label>Email Address</label>
								<input type="email" name="email" value="{{ request()->old('email') }}" class="form-control" />
								@if($errors->has('email'))
									<span class="error-block">
										@foreach($errors->get('email') as $e)	
											<p>{{ $e }}</p>
										@endforeach
									</span>
								@endif
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" value="" class="form-control" />
							</div>

							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="confirm_password" value="" class="form-control" />
							</div>

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" value="{{ request()->old('name') }}" class="form-control" />
								@if($errors->has('name'))
									<span class="error-block">
										@foreach($errors->get('name') as $e)	
											<p>{{ $e }}</p>
										@endforeach
									</span>
								@endif
							</div>

							<div class="form-group">
								<label>Gender</label>	
								<select name="gender" class="form-control">
									<option value="">-- Select --</option>
									<option value="Male" @if(request()->old('gender')) == 'Male' selected @endif>Male</option>
									<option value="Female" @if(request()->old('gender')) == 'Female' selected @endif>Female</option>
								</select>					
								@if($errors->has('gender'))
									<span class="error-block">
										@foreach($errors->get('gender') as $e)	
											<p>{{ $e }}</p>
										@endforeach
									</span>
								@endif
							</div>
							
							<div class="form-group">	
									<label>Batch</label>
									<input type="text" name="batch" value="{{ request()->old('batch') }}" class="form-control" />
									@if($errors->has('batch'))
										<span class="error-block">
											@foreach($errors->get('batch') as $e)	
												<p>{{ $e }}</p>
											@endforeach
										</span>
									@endif
							</div>	

							<div class="form-group">	
									<label>Message</label>
									<textarea name="message" class="form-control">@if(request()->old('message')) {{ request()->old('message') }} @endif</textarea>
							</div>

							<div class="form-group">	
									<label>Related Industry</label>
									<input type="text" name="related_industry" value="{{ request()->old('related_industry') }}" class="form-control" />
									@if($errors->has('related_industry'))
										<span class="error-block">
											@foreach($errors->get('related_industry') as $e)	
												<p>{{ $e }}</p>
											@endforeach
										</span>
									@endif
							</div>

							<div class="form-group">	
									<label>Position</label>
									<input type="text" name="position" value="{{ request()->old('position') }}" class="form-control" />
									@if($errors->has('position'))
										<span class="error-block">
											@foreach($errors->get('position') as $e)	
												<p>{{ $e }}</p>
											@endforeach
										</span>
									@endif
							</div>										
							<div class="text-center">
								<button type="submit" class="btn btn-almuni">Register</button>
							</div>
					  </div>
				  {{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
</div>
	<script>
		$(function()
		{
			var no_of_times = 0
			$('.pra_form_submit').on('submit', function(e)
			{
				if(no_of_times == 0)
				{
					no_of_times++;
				}
				else
				{
					alert('You have already submitted the form. Please wait');
					return false;
				}
			})
		})
	</script>
@stop