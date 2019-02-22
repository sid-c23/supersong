@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8"><h1>View Songs</h1></div>
	<div class="col-md-4"><a href="/songs/create" class="btn btn-primary">Add Song</a></div>
</div>
<div class="row">
	<ul class="list-group">
		@foreach($songs as $song)
			<a href="/songs/{{$song->id}}" class="list-group-item">{{$song->title}} by {{$song->artist}}</a>
		@endforeach
	</ul>
</div>
@endsection
