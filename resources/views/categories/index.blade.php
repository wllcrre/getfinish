@extends('main')

@section('title', '| All Items')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>   </h1>
		</div>

		<div class="">
			<a href="{{ route('items.create') }}" class='btn btn-lg btn-block btn-primary'>Create New Item</a>
		</div>
	</div><!-- end of .row -->


	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created_at</th>
					<th></th>
				</thead>

				<tbody>

				@foreach ($categories as $category)
					<tr>
						<th>
							<h4 class="text-primary">{{ $category->name }}</h4>
						</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>													
					</tr>

					@foreach($category->items as $item)
						
						<tr>
							<th>{{ $item->id }}</th>
							<td>{{ $item->name }}</td>
							<td>{{ substr($item->body, 0,25) }} {{ (strlen($item->body) > 25 ? "..." : "" ) }}</td>
							<td>{{ date('Y-m-j h:i a', strtotime($item->created_at)) }}</td>
							<td>
								<a href="{{ route('items.show', $item->id) }}" class='btn btn-default btn-sm'>View</a>
								<a href="{{ route('items.edit', $item->id) }}"  class='btn btn-default btn-sm'>Edit</a>
							</td>

							<td>
								{!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'DELETE' ]) !!}
								
								{!! Form::submit('Delete', ['class' => 'b'])  !!}
								{!! Form::close() !!}
							</td>
						</tr>

					@endforeach

				@endforeach		
				</tbody>
			</table>

			<p class="text-center">
				{{-- 頁碼 --}}
				{{-- {!! $items->links(); !!} --}}
			</p>			
		</div>


	</div>


@stop
