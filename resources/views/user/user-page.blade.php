@extends('layouts.master')

@section('title', '| User Page')

@section('content')

  <script>
    document.body.className += ' fade-out';
  </script>

  <section class="section-cover">
    <div class="user-cover">
      <div class="row">
        <div class="user-image">
          @if ($user_picture != null)
          <img src="{{ asset('storage/profiles/'.$user->name.'/'.$user_picture) }}" alt="user_picture">
        @else
          <img src="{{ URL::to('img/default_avatar.png') }}" alt="user_picture">
        @endif
        </div>
      </div>
      <div class="row">
        <div class="user-name">
          <h2>{{ $user->name }}</h2>
        </div>
      </div>
    </div>
    <a href="/annotations">
      <div class="superbox-close"></div>
    </a>
  </section>

  <section class="user-navbar">
    <div class="row">
      <div class="col span-1-of-3 box info-box">
        <i class="ion-information-circled icon-big"></i>
        <h4>Info</h4>
      </div>
      <div class="col span-1-of-3 box annotations-box">
        <i class="ion-clipboard icon-big"></i>
        <h4>Annotations</h4>
      </div>
      <div class="col span-1-of-3 box settings-box">
        <i class="ion-gear-a icon-big"></i>
        <h4>Settings</h4>
      </div>
    </div>

  </section>

  <section class="user-content">
    @include('layouts.errors')
    <div class="user-info show">
      <div class="row">
        <h2>User Info</h2>
      </div>
      <div class="user-table">
        <div class="row">
          <div class="col span-1-of-2">
            <h5>Name:</h5>
          </div>
          <div class="col span-1-of-2">
            <p>{{ $user->name }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-2">
            <h5>Email:</h5>
          </div>
          <div class="col span-1-of-2">
            <p>{{ $user->email }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-2">
            <h5>Status:</h5>
          </div>
          <div class="col span-1-of-2">
            @if (Auth::user()->isAdmin())
              <p class="user-label admin">Admin</p>
            @else
              <p class="user-label user">User</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col span-1-of-2">
            <h5>Interests:</h5>
          </div>
          <div class="col span-1-of-2">
            <p class="user-label interest">Computer</p>
            <p class="user-label interest">Fruits</p>
            <p class="user-label interest">Guitars</p>
          </div>
        </div>
      </div>
    </div>

    <div class="user-annotations hide">
      <div class="user-stats">
        <div class="row">
          <h2>Annotation Stats</h2>
        </div>
        <div class="user-table">
          <div class="row">
            <div class="col span-1-of-2">
              <h5>Domains Annotated:</h5>
            </div>
            <div class="col span-1-of-2">
              @if ($domain_name != null)
                @foreach ($domain_name as $domain)
                  <p class="user-label domain">{{ $domain }}</p>
                @endforeach
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-2">
              <h5>Annotations:</h5>
            </div>
            <div class="col span-1-of-2">
              <p class="user-label annotations">{{ $annotations_number }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-2">
              <h5>Sessions Compleated:</h5>
            </div>
            <div class="col span-1-of-2">
              <p class="user-label sessions">3</p>
            </div>
          </div>
          <div class="row">
            <div class="col span-1-of-2">
              <h5>Rating:</h5>
            </div>
            <div class="col span-1-of-2">
              <i class="ion-star"></i>
              <i class="ion-star"></i>
              <i class="ion-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="user-settings hide">
      <div class="row">
        <h2>Profile Settings</h2>
      </div>
      <div class="user-table">
        <form method="post" action="/update-picture" enctype="multipart/form-data" id="picture-form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col span-1-of-4">
              <label for="change_picture"><h5>Change Picture</h5></label>
            </div>
            <div class="col span-2-of-4">
              <input type="file" id="change_picture" name="change_picture" accept="image/*" required />
            </div>
            <div class="col span-1-of-4">
              <input type="submit" value="Update">
            </div>
          </div>
        </form>
        <form method="post" action="/update-name" id="name-form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col span-1-of-4">
              <label for="change_name"><h5>Change Name</h5></label>
            </div>
            <div class="col span-2-of-4">
              <input type="text" name="change_name" id="change_name" placeholder="New name" required />
            </div>
            <div class="col span-1-of-4">
              <input type="submit" value="Update">
            </div>
          </div>
        </form>
        <form method="post" action="/update-email" id="email-form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col span-1-of-4">
              <label for="change_name"><h5>Change Email</h5></label>
            </div>
            <div class="col span-2-of-4">
              <input type="email" name="change_email" id="change_email" placeholder="New email" required />
            </div>
            <div class="col span-1-of-4">
              <input type="submit" value="Update">
            </div>
          </div>
        </form>
        <form method="post" action="#" id="interests-form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col span-1-of-4">
              <label for="change_name"><h5>Change Interests</h5></label>
            </div>
            <div class="col span-2-of-4">
              <textarea name="change_interests" placeholder="Your Interests"></textarea>
            </div>
            <div class="col span-1-of-4">
              <input type="submit" value="Update">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  @include('layouts.footer')

  @endsection
