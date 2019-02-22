@extends('layouts.app')

@section('content')
	<form action="/songs/create" method="POST">
		@csrf
		<div class="form-group">
			<label for="title">Song title:</label>
			<input type="text" class="form-control" placeholder="Song title" name="title" required/>
		</div>
		<div class="form-group">
			<label for="artist">Artist (separate with comma):</label>
			<input type="text" class="form-control" placeholder="Artist" name="artist" required/>
		</div>
		<div class="form-group">
			<label for="imageUrl">Song Image:</label>
			<input type="file" />
		</div>
		<div class="from-group">
			<input type="submit" class="btn btn-primary" text="Submit">
		</div>
	</form>
@endsection