@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pace.css') }}">
@endsection

@section('title', '| Info')

@section('content')

  <script>
    document.body.className += ' fade-out';
  </script>
  <section class="section-steps" id="info-top">
    <div class="row">
      <h2>How it works &mdash; 3 Easy Steps</h2>
    </div>
    <div class="row">
      <div class="col span-1-of-2 steps-box js--wp-4"> <img src="img/howto_image.jpg" alt="AnnotationTool PC" class="app-screen"> </div>
      <div class="col span-1-of-2 steps-box js--wp-5">
        <div class="works-step clearfix">
          <div>1</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, fugiat?</p>
        </div>
        <div class="works-step clearfix">
          <div>2</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, nam!</p>
        </div>
        <div class="works-step clearfix">
          <div>3</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, quo.</p>
        </div>
        <div class="btn-step clearfix"> <a class="btn btn-full" @if(Auth::check()) href="/annotations" @endif href="/login">Start</a> </div>
      </div>
    </div>
  </section>
  <section class="section-features">
    <div class="row js--wp-6">
      <div class="col span-1-of-3 box"> <i class="ion-ios-stopwatch-outline icon-big"></i>
        <h4>Save Time</h4>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi ad quibusdam error mollitia. Tempore labore, alias expedita commodi molestiae eligendi! </p>
      </div>
      <div class="col span-1-of-3 box"> <i class="ion-android-checkbox-outline icon-big"></i>
        <h4>Great Accuracy</h4>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae corporis accusantium facilis tempora. Dolorem illum hic reprehenderit soluta! Consectetur atque minus, unde ducimus nostrum impedit!
          </p>
      </div>
      <div class="col span-1-of-3 box"> <i class="ion-ios-people-outline icon-big"></i>
        <h4>Big Community</h4>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur non, dolorem, porro deserunt rerum culpa. Nostrum voluptas sint dicta totam? </p>
      </div>
    </div>
  </section>
  <section class="section-about">
    <div class="row">
      <h2>About The Project</h2>
    </div>
    <div class="row">
      <blockquote> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure fugit praesentium doloribus ducimus ipsam sint, numquam, voluptas dignissimos sunt! Expedita qui neque id et eaque, itaque alias. Similique
        libero inventore laboriosam dicta suscipit enim labore eum autem voluptatum veniam eveniet ratione quis amet molestias commodi asperiores recusandae quam, vitae. Quo id, rem. Quae vitae aliquam non
        perspiciatis quaerat illo, omnis amet repellat ducimus et explicabo nulla officiis, mollitia sunt in quas voluptatem perferendis eos necessitatibus! Voluptatum velit doloremque, ipsa. Optio! </blockquote>
    </div>
    <div class="row js--wp-7">
      <div class="about-logos">
        <div class="col span-1-of-3"> <cite><img src="img/unict_logo.jpg" alt="unict_logo">Unict</cite> </div>
        <div class="col span-1-of-3"> <cite><img src="img/dieei_logo.jpg" alt="dieei_logo">DIEEI</cite> </div>
        <div class="col span-1-of-3"> <cite><img src="img/perceive_logo.jpg" alt="perceivelab_logo">PeRCeiVe Lab</cite> </div>
      </div>
    </div>
  </section>
  <section class="section-stats">
    <div class="row">
      <h2>Some Statistics</h2>
    </div>
    <div class="row stat-image"> <img src="img/stat1_dummy.jpg" alt="stat1_dummy"> </div>
    <div class="row stat-image"> <img src="img/stat2_dummy.jpg" alt="stat2_dummy"> </div>
  </section>
  <section class="section-info-form" id="contact">
    <div class="row">
      <h2>Contact Us</h2>
    </div>
    <div class="row">
      <form method="post" action="#" class="contact-form" id="info-form">
        <div class="row">
          <div class="col span-1-of-3">
            <label for="name">Name</label>
          </div>
          <div class="col span-2-of-3">
            <input type="text" name="name" id="name" placeholder="Your name" required>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-3">
            <label for="email">Email</label>
          </div>
          <div class="col span-2-of-3">
            <input type="email" name="email" id="email" placeholder="Your email" required>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-3">
            <label for="find-us">How did you find us?</label>
          </div>
          <div class="col span-2-of-3">
            <select name="find-us" id="find-us">
                        <option value="search" selected>Search engine</option>
                        <option value="ad">Advertisement</option>
                        <option value="friends">Friends</option>
                        <option value="other">Other</option>
                    </select>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-3">
            <label>Drop us a line</label>
          </div>
          <div class="col span-2-of-3">
            <textarea name="message" placeholder="Your message"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-3">
            <label>&nbsp;</label>
          </div>
          <div class="col span-2-of-3">
            <input type="submit" value="Send it!">
          </div>
        </div>
      </form>
    </div>
  </section>
@include('layouts.footer')

@endsection

@section('page-scripts')
  <script src="{{ asset('js/pace.min.js') }}"></script>
  <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
  <script>$(function () {
  		$.scrollUp({
  			scrollText: '<i class="ion-chevron-up"></i>',
  			scrollDistance: 350,
  			scrollFrom: 'bottom'
  		});
  	});</script>
  <script src="{{ asset('js/prognroll.min.js') }}"></script>
  <script>$("body").prognroll({
  			color:"#3498db"
  });</script>
@endsection
