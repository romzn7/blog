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
		{!! Form::open(array('route' => 'admin.blog.post.create')) !!}
		    		<div class='form-group'>
		    			{!! Form::label('title', 'Post Title') !!}
		    			{!! Form::text('title', null, array('class' => 'form-control')) !!}
		    		</div>
		    		
		    		<div class='form-group'>
		    			{!! Form::label('author', 'Author') !!}
		    			{!! Form::text('author', null, array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::label('category_select', 'Category') !!}
		    			{{Form::select('category_select', $category, null, array('class' => 'form-control'))}}
		    			<!-- {!! Form::select('category_select', array('$category->id[0]' => '$category->name[0]'), null, array('class' => 'form-control')) !!} -->
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::label('body', 'Body') !!}
		    			{!! Form::textarea('body', null, array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::submit('Add', array('class' => 'btn btn-default')) !!}
		    		</div>

				{!! Form::close() !!}
	</div>
	
@stop