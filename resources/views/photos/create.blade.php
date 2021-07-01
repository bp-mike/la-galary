@extends('layouts.app')
@section('title') Upload photo @endsection

@section('content')
@include('inc.messages')
    <h1> Upload Photo</h1>

    <form action="{{route('upload.photo')}}" method ="POST" enctype="multipart/form-data">
        {!! Form::open() !!}      
            {{ Form::text('title', '', ['placeholder' => 'photo Title']) }}
            {{ Form::textarea('description', '', ['placeholder' => 'photo Description']) }}
            {{ Form::hidden('album_id', $album_id) }}
            {{ Form::file('photo') }}
            {{ Form::submit('submit') }}
        {!! Form::close() !!}
    </form>
@endsection