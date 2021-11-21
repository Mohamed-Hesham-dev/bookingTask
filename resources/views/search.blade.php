@extends('App.app')
@section('content')



<div>
	<nav class="navbar bg-light">

		<h1>All Hotel</h1>
		<ul>
			@foreach ($hotels as $hotel)
			<li class="nav-item">
				<a class="nav-link" href="{{url('hotel/'.$hotel->id)}}"><i
						class="fa fa-tshirt"></i>{{$hotel->name}}</a>
			</li>
			@endforeach
		</ul>

	</nav>
</div>

@endsection