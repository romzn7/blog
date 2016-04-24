@extends('layout.admin-master')



@section('content')
				@if(Session::has('success'))
					<div class="alert alert-success">
							{{ Session::get('success') }}
					</div>
				@endif

				@if(Session::has('fail'))
					<div class="alert alert-danger">
							{{ Session::get('fail') }}
					</div>
				@endif

				@if(Session::has('error'))
					<div class="alert alert-warning">
							{{ Session::get('error') }}
					</div>
				@endif
				
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				       
				            @foreach ($errors->all() as $error)
			                	{{ $error }}
				            @endforeach
				        
				    </div>
				@endif

		@include('include.admin-header')
	
	<div class="container">
		<div class="row">
	  <div class="col-md-4">
	  	<table class="table table-striped">

		<thead><a href="{{ route('admin.blog.create_post') }}" class="btn btn-default">New Post</a> <a href="{{ route('admin.blog.post.all')}}" class="btn btn-default"> Show All Posts</a></thead>
		@if(count($posts) < 0 )
			No Posts
		@else
			@foreach($posts as $post)

				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{ $post->title }}</h3>
				    <h5 class="panel-title">{{ $post->author }} | {{ $post->created_at }}</h5>
				  </div>
				  <div class="panel-body">
				    {{ $post->body }}
				  </div>
				  <div class="btn-group" role="group" aria-label="...">
				  	  <a href="{{ route('admin.blog.post.single', ['post_id'=>$post->id, 'end'=>'admin']) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a>
					  <a href="{{ route('admin.blog.post.edit', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
					  <a href="{{ route('admin.blog.post.delete', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
					  
				  </div>
				</div>
			@endforeach
				</table>

				</div>	
			
		@endif

	  <div class="col-md-4">
	  		<table class="table table-striped">

			<thead><a href="{{ route('admin.blog.contact-messages')}}" class="btn btn-default"> Show All Messages</a></thead>
			@if(count($contact) < 0 )
				No Posts
			@else

			@foreach($contact as $contacts)
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">{{ $contacts->subject }}</h3>
			    <h5 class="panel-title">{{ $contacts->sender }}</h5>
			  </div>
			  <div class="panel-body">
			    {{ $contacts->body }}
			  </div>
			
			  <div class="btn-group" role="group" aria-label="...">
				  <a href="{{ route('admin.blog.contact-messages/single', ['cont_id' => $contacts->id ]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a>
				  <a href="{{ route('admin.blog.contact-messages/delete', ['cont_id' => $contacts->id ]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
			  </div>

			</div>
			@endforeach
			</table>
			@endif
	  </div>
	</div>

	</div>

	
	
	