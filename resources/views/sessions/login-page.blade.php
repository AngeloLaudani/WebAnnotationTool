@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pace.css') }}">
@endsection

@section('title', '| Login')

@section('content')

  <script>
    document.body.className += ' fade-out';
  </script>
  <div class="full-screen">
    <div class="section-form">
      <div class="contact-box js--wp-2">
        <div class="row"> <a class="animsition-link" href="/"><img class="logo" src="img/AnnotationTool_logo.jpg" alt="AnnotationTool Logo"></a> </div>
        <div class="row">
          <h2>Enter Your Account</h2>
        </div>
        <div class="row">

          <form method="post" action="/login" class="contact-form">
            {{ csrf_field() }}

            <div class="row">
              <label for="email">Email</label>
            </div>
            <div class="row">
              <input type="text" name="email" id="email" placeholder="Your email" required />
            </div>
            <div class="row">
              <label for="password">Password</label>
            </div>
            <div class="row">
              <input type="password" name="password" id="password" placeholder="Your password" required />
            </div>
            <div class="row">
              <input type="submit" value="Login">
            </div>
            @include('layouts.errors')
            <div class="row">
              <label>&nbsp;</label>
            </div>
            <div class="row">
              <p>Forgotten your password?&nbsp;<a href="/forgotten-password">Reset it</a></p>
            </div>
            <div class="row">
              <p>Don't have an account?&nbsp;<a href="/register">Sign up now</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('page-scripts')
  <script src="{{ asset('js/pace.min.js') }}"></script>
@endsection
