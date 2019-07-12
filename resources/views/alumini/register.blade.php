@extends('main')

@section('page-title')
	Alumini Register
@stop

@section('content')
	<div class="content">
		<a href="{{ route('alumini-view-get') }}" class="btn btn-info btn-flat">View Alumini</a>
	</div>
	<form method="post" class="pra_form_submit">
		<input type="hidden" autocomplete="off">
		<label>Email</label>
		<input type="email" name="email" value="{{ request()->old('email') }}"/>
		@if($errors->has('email'))
			<span class="error-block">
				@foreach($errors->get('email') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<label>Password</label>
		<input type="password" name="password" value=""/><br/>
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" value=""/><br/>
		<label>Name</label>
		<input type="text" name="name" value="{{ request()->old('name') }}"/>
		@if($errors->has('name'))
			<span class="error-block">
				@foreach($errors->get('name') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<label>Gender</label>
		<select name="gender">
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
		<br/>
		<label>Batch</label>
		<input type="text" name="batch" value="{{ request()->old('batch') }}"/>
		@if($errors->has('batch'))
			<span class="error-block">
				@foreach($errors->get('batch') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<label>Message</label>
		<textarea name="message">@if(request()->old('message')) {{ request()->old('message') }} @endif</textarea>
		<br/>
		<label>Related Industry</label>
		<input type="text" name="related_industry" value="{{ request()->old('related_industry') }}"/>
		@if($errors->has('related_industry'))
			<span class="error-block">
				@foreach($errors->get('related_industry') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		
		<br/>
		<label>Position</label>
		<input type="text" name="position" value="{{ request()->old('position') }}"/>
		@if($errors->has('position'))
			<span class="error-block">
				@foreach($errors->get('position') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<input type="submit" value="Register">
		{{ csrf_field() }}
	</form>

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