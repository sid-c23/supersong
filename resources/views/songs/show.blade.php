@extends('layouts.app')

@section('content')
<h1>{{$song->title}} by {{$song->artist}}</h1>
<a class="btn btn-danger" href="/songs/delete/{{$song->id}}">Delete</a>
@endsection