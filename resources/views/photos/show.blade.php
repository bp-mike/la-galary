@extends('layouts.app')

@section('content')
@include('inc.messages')

    <h1>  {{ $photo->title }} </h1>
    <a href="{{ url('/album/'.$photo->album->id) }}" class="button secondary"> Go Back </a>
    <hr />
    <img class="thumbnail" src="/storage/photo/{{ $photo->album_id }}/{{$photo->photo}}" alt="{{$photo->title}}">
    <br><br>
    <form action="{{ route('show.photo', $photo )}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="button alert">Delete</button>
    </form>
    <hr>
    <small>Size: {{ $photo->size}} </small>
@endsection