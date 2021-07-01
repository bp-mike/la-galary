@extends('layouts.app')
@section('title') home @endsection

@section('content')
@include('inc.messages')
    <h1>Home</h1>
  @if(count($albums) > 0)
    <?php
      $colcount = count($albums);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="row text-center">
        @foreach($albums as $album)
          @if($i == $colcount)
             <div class='medium-4 columns end'>
               <a href="{{ route('show.album', $album)}}">
                  <img class="thumbnail" src="storage/album_cover/{{$album->cover_image}}" alt="{{$album->name}}">
                </a>
               <br>
               <h4>{{$album->name}}</h4>
          @else
            <div class='medium-4 columns'>
              <a href="{{ route('show.album', $album)}}">
                <img class="thumbnail" src="storage/album_cover/{{$album->cover_image}}" alt="{{$album->name}}">
              </a>
              <br>
              <h4>{{$album->name}}</h4>
          @endif
        	@if($i % 3 == 0)
          </div></div><div class="row text-center">
        	@else
            </div>
          @endif
        	<?php $i++; ?>
        @endforeach
      </div>
    </div>
  @else
    <p>No Albums To Display</p>
  @endif

@endsection
