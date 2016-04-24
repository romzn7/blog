@extends('layout.admin-master')



@section('content')
	@include('include.info')

	@include('include.admin-header')
		<div class="container">
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
					  <a href="{{ route('admin.blog.post.single', ['post_id'=>$post->id, 'end'=>'admin']) }}"><button type="button" href="" class="btn btn-default"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a>
					  <a href="{{ route('admin.blog.post.edit', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
					  <a href="{{ route('admin.blog.post.delete', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
				  </div>
				</div>
			@endforeach
				</table>

				</div>	
			
		@endif

		@if($posts->lastPage() > 1)
			<nav>
			  <ul class="pager">
			  		@if($posts->currentPage() !== 1)
			    		<li><a href="{{ $posts->previousPageUrl() }}">Previous</a></li>
			    	@endif
			    	@if($posts->currentPage() !== $posts->lastPage())	
			    		<li><a href="{{ $posts->nextPageUrl() }}">Next</a></li>
			    	@endif
			  </ul>
			</nav>
		@endif
		</div>
		

@stop