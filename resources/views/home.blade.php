@extends('layouts.master')

@section('title', '| Welcome')

@section('content')

  <div class="splash" id="horizontal_scroll">
    <div class="hero js--wp-1">
      <div class="row">
        <h1>AnnotationTool</h1>
        <h3>Annotate Your World</h3>
      </div>
      <div class="row">
        <div class="col span-1-of-2"> <a class="btn btn-full" @if(Auth::check()) href="/annotations" @endif href="/login">Start</a> </div>
        <div class="col span-1-of-2"> <a class="btn btn-full" href="/info">Info</a> </div>
      </div>
    </div>
  </div>

@endsection
