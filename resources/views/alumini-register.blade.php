<!DOCTYPE html>
<html>
<head>
	<title>Alumini Register</title>
</head>
<body>
	@if(\Session::has('success-msg'))
		<p>{{ \Session::get('success-msg') }}</p>
	@endif
	@if(\Session::has('error-msg'))
		<p>{{ \Session::get('error-msg') }}</p>
	@endif
	<form method="post">
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
</body>
</html>