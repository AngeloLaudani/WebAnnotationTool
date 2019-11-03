@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pace.css') }}">
@endsection

@section('title', '| Password Reset')

@section('content')

  <div class="full-screen">
    <div class="section-form">
      <div class="contact-box js--wp-2" id="password-form">
        <div class="row"> <a href="/"><img class="logo" src="img/AnnotationTool_logo.jpg" alt="AnnotationTool Logo"></a> </div>
        <div class="row">
          <h2>Reset Your Password</h2>
        </div>
        <div class="row">
          <form method="post" action="#" class="contact-form">
            <div class="row">
              <label for="email">Email</label>
            </div>
            <div class="row">
              <input type="text" name="email" id="email" placeholder="Your email" required />
            </div>
            <div class="row">
              <input type="submit" value="Reset">
            </div>
            <div class="row">
              <label>&nbsp;</label>
            </div>
            <div class="row">
              <p>Go back to&nbsp;<a href="/login">Login screen</a></p>
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
