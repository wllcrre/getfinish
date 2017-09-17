@extends('main')

@section('title', '| Edit Item')



@section('content')

	<div class="row">

		{!! Form::model($item, array('route' => ['items.update', $item->id])) !!}
		<div class="col-md-8">
			{{ Form::label('name','Name:') }}
			{{ Form::text('name',null,["class" => 'form-control input-lg']) }}

			{{ Form::label('body','Body:',['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body',null,["class" => 'form-control']) }}
			 
		</div>

		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="">
				  <dt>Create At:</dt>
				  <dd>{{ date('Y-m-j h:i a', strtotime($item->created_at)) }}</dd>
				</dl>

				<dl class="">
				  <dt>Last Updated:</dt>
				  <dd>{{ date('Y-m-j h:i a', strtotime($item->updated_at)) }}</dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('items.show', 'Cancel', array($item->id), array('class' => 'btn btn-danger btn-block'))!!}
						{{-- <a href="#" class='btn btn-primary btn-block'>Edit</a> --}}
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('items.update', 'Save', array($item->id), array('class' => 'btn btn-success btn-block'))!!}					
						{{-- <a href="#" class='btn btn-danger btn-block'>Delete</a> --}}
					</div>					
				</div>				
			</div>
		</div>
		{!! Form::close() !!}
	</div> <!-- end of .row -->
@stop
