@extends('layouts.app')
@section('title') contact @endsection

@section('content')
@include('inc.messages')
    <h1> Create Album</h1>

    <form action="{{route("create.album")}}" method ="POST" enctype="multipart/form-data">
        {!! Form::open() !!}      
            {{ Form::text('name', '', ['placeholder' => 'Album Name']) }}
            {{ Form::textarea('description', '', ['placeholder' => 'Album Description']) }}
            {{ Form::file('cover_image') }}
            {{ Form::submit('submit') }}
        {!! Form::close() !!}
    </form>
@endsection