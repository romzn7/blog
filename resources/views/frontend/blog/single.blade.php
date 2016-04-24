@extends('layout.master')

@section('title')
	Blog Post
@stop

@section('content')
			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{ $post->title }}</h3>
				    <h5 class="panel-title">{{ $post->author }} | {{ $post->created_at }}</h5>
				  </div>
				  <div class="panel-body">
				    {{ $post->body }}
				  </div>
			</div>

@stop