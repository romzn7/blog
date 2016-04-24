@extends('layout.master')

@section('title')
	Contact
@stop

@section('content')

	{!! Form::open(array('route' => 'contact/send', 'method' => 'post' )) !!}
    		<div class='form-group'>
    			{!! Form::label('name', 'Name') !!}
    			{!! Form::text('name', null, array('class' => 'form-control')) !!}
    		</div>
    		
    		<div class='form-group'>
    			{!! Form::label('email', 'E-Mail') !!}
    			{!! Form::email('email', null, array('class' => 'form-control')) !!}
    		</div>

    		<div class='form-group'>
    			{!! Form::label('subject', 'Subject') !!}
    			{!! Form::text('subject', null, array('class' => 'form-control')) !!}
    		</div>

    		<div class='form-group'>
    			{!! Form::label('message', 'Message') !!}
    			{!! Form::textarea('message', null, array('class' => 'form-control')) !!}
    		</div>

    		<div class='form-group'>
    			{!! Form::submit('Submit', array('class' => 'btn btn-default')) !!}
    		</div>

		{!! Form::close() !!}

@stop