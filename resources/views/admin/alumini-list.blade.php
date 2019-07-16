@extends('admin-main')
@section('content')


<div class="container">

	<div class=" almuni-header" style="text-align: left !important;">Refine Search:</div>
	<div class="bdr" style="margin-bottom: 20px;">	</div>		
	<div class="row">	
		<div class="col-sm-3">	
			 	<div class="form-group">
					<label>Batch</label>
					<select name="gender" class="form-control">
						<option value="">-- Select --</option>
						<option value="2016" >2016</option>
						<option value="2017">2017</option>
					</select>
				</div>
		</div>
		
		<div class="col-sm-3">			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
		</div>		

		<div class="col-sm-3">
				<div class="form-group">
					<label>Email Address</label>
					<input type="text" name="email" class="form-control">
				</div>
		</div>		
		<div class="col-sm-3">		
				<div class="form-group">
					<label>Related Industry</label>
					<select name="gender" class="form-control">
						<option value="">-- Select --</option>
						<option value="it" >IT</option>
						<option value="eng">Engineer</option>
					</select>
				</div>
		</div>
		
		<div class="col-sm-3">		
				<div class="form-group">
					<label>Gender</label>
					<select name="gender" class="form-control">
						<option value="">-- All --</option>
						<option value="it" >Male</option>
						<option value="eng">Female</option>
					</select>
				</div>
		</div>
		
		<div class="col-sm-3">		
			<div class="form-group">
				<label>Verify</label>
				<select name="gender" class="form-control">
					<option value="">-- All --</option>
					<option value="it" >Yes</option>
					<option value="eng">No</option>
				</select>
			</div>
		 </div>	

		 <div class="col-sm-12">
			 	<div class="text-center">
			 		<button class="btn btn-almuni" style="width: auto !important; padding: 7px 35px !important;" >Search</button>
			 	</div>	
		 </div> 
	</div>	

<div class=" almuni-header" style="text-align: left !important;">Almuni List:</div>
	<div class="bdr" style="margin-bottom: 20px;">	</div>	
<div class="table-responsive">	
	<table class="table maintable-bordered table-striped">
		<thead>
			<tr>
				<th>SN</th>
				<th>Batch</th>
				<th>Name</th>
				<th>Email</th>
				<th style="width: 300px !important; white-space: normal !important;">Message</th>
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
					<td>{{ $d->email}}</td>
					<td class="message-almuni-card" style="width: 300px !important; white-space: normal !important;">{{ $d->message }}</td>
					<td>{{ $d->related_industry }}</td>
					<td>{{ $d->position }}</td>
					<td>{{ $d->gender }}</td>
					<td>{{ $d->is_verified }}</td>
					<td>
						<div class="text-center">
							<a href="" data-toggle="modal" data-target="#myModal-{{ $d->id }}"><i class="fas fa-eye"></i></a>
						</div>
						@if($d->is_verified == 'yes')
							<form method="post" action="{{ route('admin-publish-unpublish-alumini-post', [$d->id, 'no']) }}">
								<button type="submit" class="btn btn-danger btn-action" value="Unpublish">Unpublish <i class="fas fa-folder-minus" style="color: #fff;"></i></button>
								{{ csrf_field() }}
							</form>
						@else
							<form method="post" action="{{ route('admin-publish-unpublish-alumini-post', [$d->id, 'yes']) }}">
								<button type="submit" class="btn btn-almuni btn-action" value="Publish">Publish &nbsp;&nbsp; <i class="fas fa-folder-plus" style="color: #fff;"></i></button>
								{{ csrf_field() }}
							</form>
						@endif
					</td>
				</tr>
				<!-- Modal -->
		<div id="myModal-{{ $d->id }}" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		      	<div class="almuni-info" style="display: inline-block;">	
			  			<div class="head" style="text-transform: capitalize; font-size: 18px;"><strong>{{ $d->name }}'s message:</strong></div>
			  	</div>		
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body" style="padding: 0px 15px;">
		        	<div class="almuni-info">
			    		<div class="head" style="text-transform: capitalize;">Message</div>
			    		<div class="bdr"></div>
			    		<div class="title message-almuni">{{ $d->message }}</div>
			    	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-almuni" data-dismiss="modal" style="width: 80px !important; padding: 7px 0 !important; ">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
			@endforeach
		</tbody>
	</table>
</div>
</div>
	{{ $data->links() }}
@stop