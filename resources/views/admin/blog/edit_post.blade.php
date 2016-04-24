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
		{!! Form::open(array('route' => 'admin.blog.post.update')) !!}
		    		<div class='form-group'>
		    			{!! Form::label('title', 'Post Title') !!}
		    			{!! Form::text('title', $post->title, array('class' => 'form-control')) !!}
		    		</div>
		    		
		    		<div class='form-group'>
		    			{!! Form::label('author', 'Author') !!}
		    			{!! Form::text('author', $post->author, array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::label('category_select', 'Category') !!}
		    			{!! Form::select('category_select', array('dummy' => 'Dummy Category'), null, array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::label('body', 'Body') !!}
		    			{!! Form::textarea('body', $post->body, array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::hidden('id', $post->id) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::submit('Update', array('class' => 'btn btn-default')) !!}
		    		</div>

				{!! Form::close() !!}
	</div>
	
@stop