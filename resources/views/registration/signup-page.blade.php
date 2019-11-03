@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pace.css') }}">
@endsection

@section('title', '| Signup')

@section('content')

  <script>document.body.className += ' fade-out';</script>
  <div class="signup-background">

  @include('layouts.signup-header')

  <div class="section-form" id="signup-form">
    <div class="contact-box js--wp-3">
      <div class="row">
        <h2>Create Your Account</h2>
      </div>
      <div class="row">

        <form method="post" action="/register" class="contact-form">
          {{ csrf_field() }}
          <div class="row">
            <label for="name">Name</label>
          </div>
          <div class="row">
            <input type="text" name="name" id="name" placeholder="Your Name" required />
          </div>
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
            <label for="password_confirmation">Confirm Password</label>
          </div>
          <div class="row">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat password" required />
          </div>
          @include('layouts.errors')
          <div class="row">
            <input type="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@include('layouts.footer')

@endsection

@section('page-scripts')
  <script src="{{ asset('js/pace.min.js') }}"></script>
@endsection
