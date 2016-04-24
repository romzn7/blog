@extends('layout.master')

@section('title')
	Homepage
@stop

@section('content')
	@if( count($posts)  < 0 )
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
					  <a href="{{ route('blog.single', ['post_id'=>$post->id, 'end'=>'frontend']) }}"><button type="button" class="btn btn-default">Read More</button></a>
				  </div>
			</div>
		@endforeach

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
	 

@stop