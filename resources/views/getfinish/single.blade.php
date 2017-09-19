@extends('main')

@section('title', "| $item->name")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $item->name }}</h1>
			<p>{{ $item->body }}</p>
		</div>
	</div>

@endsection
