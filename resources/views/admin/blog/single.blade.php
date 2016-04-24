@extends('layout.admin-master')

@include('include.admin-header')

@section('content')

<div class="container">
				<table class="table table-striped">

		<thead>
			<a href="{{ route('admin.blog.post.edit', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
		    <a href="{{ route('admin.blog.post.delete', ['post_id'=>$post->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>			
			<div class="panel panel-default">
			 <div class="panel-heading">
				    <h3 class="panel-title">{{ $post->title }}</h3>
				    <h5 class="panel-title">{{ $post->author }} | {{ $post->created_at }}</h5>
				  </div>
				  <div class="panel-body">
				    {{ $post->body }}
				  </div>
				</div>
			</table>

</div>	
			
		
@stop