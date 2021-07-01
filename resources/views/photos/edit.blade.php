@extends('layouts.app')
@section('title') contact @endsection

@section('content')
@include('inc.messages')
    <h1> Edit {{ $album->name}} </h1>
@endsection