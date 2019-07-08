@extends('main')

@section('page-title')
	Alumini List
@stop

@section('content')
	<form method="post" action="{{ route('admin-logout-post') }}">
		<input type="submit" value="Logout" class="btn btn-flat btn-danger">	
		{{ csrf_field() }}
	</form>

	<table class="table maintable-bordered table-striped">
		<thead>
			<tr>
				<th>SN</th>
				<th>Batch</th>
				<th>Name</th>
				<th>Message</th>
				<th>Related Industry</th>
				<th>Position</th>
				<th>Gender</th>
				<th>Is Verified</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $index => $d)
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ $d->batch }}</td>
					<td>{{ $d->name }}</td>
					<td>{{ $d->message }}</td>
					<td>{{ $d->related_industry }}</td>
					<td>{{ $d->position }}</td>
					<td>{{ $d->gender }}</td>
					<td>{{ $d->is_verified }}</td>
					<td>
						@if($d->is_verified == 'yes')
							<form method="post" action="{{ route('admin-publish-unpublish-alumini-post', [$d->id, 'no']) }}">
								<input type="submit" class="btn btn-success btn-flat" value="Unpublish">
								{{ csrf_field() }}
							</form>
						@else
							<form method="post" action="{{ route('admin-publish-unpublish-alumini-post', [$d->id, 'yes']) }}">
								<input type="submit" class="btn btn-success btn-flat" value="Publish">
								{{ csrf_field() }}
							</form>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $data->links() }}
@stop