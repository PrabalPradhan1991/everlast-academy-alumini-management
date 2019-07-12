@extends('main')

@section('content')

<div class="content">	
	@if(!(\Session::get('alumini_id')))
		<a href="{{ route('alumini-login-get') }}" class="btn btn-info btn-flat">Login</a>
		<a href="{{ route('alumini-register-get') }}" class="btn btn-info btn-flat">Register</a>
	@else
		<a href="{{ route('alumini-edit-get') }}" class="btn btn-info btn-flat">Edit My Details</a>
	@endif
</div>
	<div class="row">
		@foreach($data as $d)
		<div class="col-md-4">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="{{ asset('images/no-img.jpg') }}" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title">Details</h5>
			    <p><strong>Name: </strong>{{ $d->name }}</p>
			    <p><strong>Email: </strong>{{ $d->email }}</p>
				<p><strong>Batch: </strong>{{ $d->batch }}</p>
				<p><strong>Related Industry: </strong>{{ $d->related_industry }}</p>
				<p><strong>Position: </strong>{{ $d->position }}</p>
				<p><strong>Message: </strong>{{ $d->message }}</p>
			    <a href="#" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
		</div>
		@endforeach

	</div>
		
@stop