@extends('main')

@section('title', '| Create New Item')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>新增待辦事項</h1>
			<hr>

			{!! Form::open(array('route' => 'items.store','data-parsley-validate' => '')) !!}
				{{ Form::label('name', 'Name:')}}
				{{ Form::text('name', null , array('class' => 'form-control','required' => '','minlength' => '2','maxlength' => '255'))}}

				{{ Form::label('slug', 'Slug:')}}
				{{ Form::text('slug', null , array('class' => 'form-control','required' => '','maxlength' => '255'))}}

				{{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach
				</select>


				{{ Form::label('body', 'Item Body:')}}
				{{ Form::textarea('body', null, array('class' => 'form-control'))}}

				{{ Form::submit('Create Item', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;'))}}
			{!! Form::close() !!}			
		</div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection
