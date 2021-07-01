@extends('layouts.app')

@section('content')
@include('inc.messages')
  <h1> show {{ $album->name }} </h1>
  <a href="{{ url('/') }}" class="button secondary"> Go Back </a>
  <a href="{{ route('create.photo', $album)}}">Upload Photo to Album</a>
  <hr />
  @if(count($album->photos) > 0)
    <?php
      $colcount = count($album->photos);
      $i = 1;
    ?>
    <div id="photos">
      <div class="row text-center">
        @foreach($album->photos as $photo)
          @if($i == $colcount)
            <div class='medium-4 columns end'>
              <a href="{{ route('show.photo', $photo)}}">
                  <img class="thumbnail" src="/storage/photo/{{ $photo->album_id }}/{{$photo->photo}}" alt="{{$photo->title}}">
                </a>
              <br>
              <h4>{{$photo->title}}</h4>
          @else
            <div class='medium-4 columns'>
              <a href="{{ route('show.photo', $photo)}}">
                <img class="thumbnail" src="/storage/photo/{{ $photo->album_id }}/{{$photo->photo}}" alt="{{$photo->title}}">
              </a>
            <br>
            <h4>{{$photo->title}}</h4>
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
    <p>No photos to display To Display</p>
  @endif
@endsection

