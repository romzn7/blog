@extends('layout.admin-master')

@section('content')
	
		@include('include.admin-header')
		<div class="container">
			<div>
				<form class="navbar-form navbar-left" method='post' action="{{ route('admin.blog.categories.update') }}">
				  <div class="form-group">

				   <input type="text" name="name" class="form-control" value="{{ $category->name  }}" placeholder="Add Category Name">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				  <input type="hidden" name="category_id" value="{{ $category->id }}"/>
				</form>
			</div>

	</div>
@stop