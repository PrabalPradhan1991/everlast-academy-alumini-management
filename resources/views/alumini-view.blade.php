@extends('main')

@section('content')
	<div class="container">	
			<div class="panel-body almuni-header">
					    Almuni View
			</div>
	</div>
	<div class="row">

		@foreach($data as $d)
		<div class="col-md-4">
			<div class="card almuni-card">
				<div style="background: #374785c9; padding: 15px; ">	
						<div class="almuni-image" >	
							<img class="card-img-top" src="{{ asset('images/ashim.jpg') }}" alt="Card image cap">
			  			 </div> 
				</div>
			    
			  <div class="card-body card-almuni">
			  		<div class="almuni-info">	
			  			<div class="head">{{ $d->name }}</div>
			    		<div class="title">{{ $d->position }}</div>
			  		</div>
			    	
			    	<div class="almuni-info">	
						<p><strong>Related Industry: </strong>{{ $d->related_industry }}</p>
					</div>

			    	<div class="almuni-info">
			    		<p><strong>Batch: </strong>{{ $d->batch }}</p>
			    		<p><strong>Email: </strong>{{ $d->email }}</p>
			    	</div>

			    	<div class="almuni-info">
			    		<div class="head" style="text-transform: capitalize;">Message</div>
			    		<div class="bdr"></div>
			    		<div class="title message-almuni message-almuni-card">{{ $d->message }}</div>
			    	</div>


	
					
				
			    	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $d->id }}">Go somewhere</a>
			  </div>
			</div>
		</div>

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

	</div>
		
@stop