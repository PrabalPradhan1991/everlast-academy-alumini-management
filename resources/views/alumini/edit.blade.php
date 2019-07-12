@extends('main')

@section('page-title')
	Alumini Edit
@stop

@section('content')
	<div class="content">
		<a href="{{ route('alumini-view-get') }}" class="btn btn-info btn-flat">View Alumini</a>
	</div>
	
	<form method="post" action="{{ route('alumini-logout-post') }}">
		<input type="submit" value="Logout" class="btn btn-danger btn-flat"/>
		{{ csrf_field() }}
	</form>
	<form method="post">
		<input type="hidden" autocomplete="off">
		<label>Email</label>
		<input type="email" name="email" value="{{ $data->email }}"/>
		@if($errors->has('email'))
			<span class="error-block">
				@foreach($errors->get('email') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<label>Name</label>
		<input type="text" name="name" value="{{ $data->name }}"/>
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
			<option value="Male" @if($data->gender == 'Male') selected @endif>Male</option>
			<option value="Female" @if($data->gender == 'Female') selected @endif>Female</option>
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
		<input type="text" name="batch" value="{{ $data->batch }}"/>
		@if($errors->has('batch'))
			<span class="error-block">
				@foreach($errors->get('batch') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<label>Message</label>
		<textarea name="message">@if($data->message) {{ $data->message }} @endif</textarea>
		<br/>
		<label>Related Industry</label>
		<input type="text" name="related_industry" value="{{ $data->related_industry }}"/>
		@if($errors->has('related_industry'))
			<span class="error-block">
				@foreach($errors->get('related_industry') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		
		<br/>
		<label>Position</label>
		<input type="text" name="position" value="{{ $data->position }}"/>
		@if($errors->has('position'))
			<span class="error-block">
				@foreach($errors->get('position') as $e)	
					<p>{{ $e }}</p>
				@endforeach
			</span>
		@endif
		<br/>
		<input type="submit" value="Update" class="btn btn-success btn-flat">
		{{ csrf_field() }}
	</form>
@stop