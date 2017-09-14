@extends('main')

@section('title', '| Create New Item')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>新增待辦事項</h1>
			<hr>

			{!! Form::open(['route' => 'items.store']) !!}
				{{ Form::label('name', 'Name:')}}
				{{ Form::text('name', null , array('class' => 'form-control'))}}

				{{ Form::label('body', 'Item Body:')}}
				{{ Form::textarea('body', null, array('class' => 'form-control'))}}

				{{ Form::submit('Create Item', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;'))}}
			{!! Form::close() !!}			
		</div>
	</div>
@endsection
