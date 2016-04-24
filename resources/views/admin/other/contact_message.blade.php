@extends('layout.admin-master')



@section('content')
	@include('include.info')

	@include('include.admin-header')
		<div class="container">
				<table class="table table-striped">
		
		@if(count($contact) < 0 )
			No Posts
		@else
			@foreach($contact as $contacts)

				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{ $contacts->subject }}</h3>
				    <h5 class="panel-title">{{ $contacts->sender }} | {{ $contacts->created_at }}</h5>
				  </div>
				  <div class="panel-body">
				    {{ $contacts->body }}
				  </div>
				  <div class="btn-group" role="group" aria-label="...">
					  <a href="{{ route('admin.blog.contact-messages/single', ['cont_id' => $contacts->id ]) }}"><button type="button" href="" class="btn btn-default"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a>
					  <a href="{{ route('admin.blog.contact-messages/delete', ['cont_id' => $contacts->id ]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
				  </div>
				</div>
			@endforeach
				</table>

				</div>	
			
		@endif

		
		</div>
		

@stop