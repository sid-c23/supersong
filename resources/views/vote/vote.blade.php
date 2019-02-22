@extends('layouts.app')
@section('content')
	<h2 class="text-center">SuperSong</h2>
	<p class="lead text-center">Click the left or right arrow keys to pick the better song</p>
	<battlefield></battlefield>
	<p></p>
	<ul class="list-group">
		@foreach($songs as $song)
			<li class="list-group-item">{{$song->title}} by {{$song->artist}}</li>
		@endforeach
	</ul>
@endsection