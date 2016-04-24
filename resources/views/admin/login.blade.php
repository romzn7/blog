@extends('layout.admin-master')

@section('content')
	
	@include('include.info')

	@include('include.admin-header')

	<div class="container">
		{!! Form::open(array('route' => 'admin.login', 'method' => 'post')) !!}
		    		<div class='form-group'>
		    			{!! Form::label('email', 'Email') !!}
		    			{!! Form::email('email', null, array('class' => 'form-control')) !!}
		    		</div>
		    		
		    		<div class='form-group'>
		    			{!! Form::label('password', 'Password') !!}
		    			{!! Form::password('password', array('class' => 'form-control')) !!}
		    		</div>

		    		<div class='form-group'>
		    			{!! Form::submit('Login', array('class' => 'btn btn-default')) !!}
		    		</div>

				{!! Form::close() !!}
	</div>

@stop