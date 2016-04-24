@extends('layout.admin-master')

@section('content')
	
		@include('include.admin-header')
		<div class="container">
			<div>
				<form class="navbar-form navbar-left" method='post' role="search" action="{{ route('admin.blog.categories.create') }}">
				  <div class="form-group">

				   <input type="text" name="name" class="form-control" placeholder="Add Category Name">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				</form>
			</div>
					<br><br><br><br>

		<section>
			<table class="table table-striped">
				@if(count($categories) < 0 )
					No Posts
				@else
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Categories</h3>
						  </div>
						  @foreach($categories as $category)
						  <div class="panel-body">
						    {{ $category->name }}
						  </div>
						  <div class="btn-group" role="group" aria-label="...">
							  <a href="{{ route('admin.blog.categories.edit', ['category_id' => $category->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
							  <a href="{{ route('admin.blog.categories.delete', ['category_id' => $category->id]) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
							  
						  </div>
						  <hr>
						 @endforeach
						</div>
					
						</table>
				@endif
				
		</section>
		@if($categories->lastPage() > 1)
			<nav>
			  <ul class="pager">
			  		@if($categories->currentPage() !== 1)
			    		<li><a href="{{ $categories->previousPageUrl() }}">Previous</a></li>
			    	@endif
			    	@if($categories->currentPage() !== $categories->lastPage())	
			    		<li><a href="{{ $categories->nextPageUrl() }}">Next</a></li>
			    	@endif
			  </ul>
			</nav>
		@endif


	</div>
@stop