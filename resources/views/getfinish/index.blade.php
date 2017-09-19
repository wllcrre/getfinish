@extends('main')

@section('title', '| Getfinish')

@section('content')


	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Getfinish</h1>
		</div>
	</div>

	@foreach ($items as $item)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $item->name }}</h2>
			<h5>Published: {{ date('M j, Y', strtotime($item->created_at)) }}</h5>

			<p>{{ substr($item->body, 0, 250) }}{{ strlen($item->body) > 250 ? '...' : "" }}</p>

			<a href="{{ route('getfinish.single', $item->slug) }}" class="btn btn-primary">Read More</a>
			<hr>
		</div>
	</div>
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $items->links() !!}
			</div>
		</div>
	</div>


@endsection
