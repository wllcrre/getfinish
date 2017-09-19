@extends('main')

@section('title','| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $item->name }}</h1>
			<p>{{ $item->slug }}</p>
			<p class='lead'>{{ $item->body }}</p>
		</div>

		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="">
				  <dt>URL:</dt>
				  <dd><a href="{{ route('getfinish.single', $item->slug) }}">{{ route('getfinish.single', $item->slug) }}</a></dd>
				</dl>

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
						{!! Html::linkRoute('items.edit', 'Edit', array($item->id), array('class' => 'btn btn-primary btn-block'))  !!}
						{{-- <a href="#" class='btn btn-primary btn-block'>Edit</a> --}}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'DELETE' ]) !!}
						
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])  !!}
						{!! Form::close() !!}
					</div>					
				</div>				
			</div>
		</div>
	</div>


@endsection
