@extends('layout.admin-master')

@include('include.admin-header')

@section('content')

<div class="container">
				<table class="table table-striped">

		<thead>
			
		    <a href="{{ route('admin.blog.contact-messages/delete', ['cont_id' => $contact->id ]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>			
			<div class="panel panel-default">
			 <div class="panel-heading">
				    <h3 class="panel-title">{{ $contact->subject }}</h3>
				    <h5 class="panel-title">{{ $contact->sender }} | {{ $contact->created_at }}</h5>
				  </div>
				  <div class="panel-body">
				    {{ $contact->body }}
				  </div>
				</div>
			</table>

</div>	
			
		
@stop