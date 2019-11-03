<header class="main-header js--wp-8 js--main-header">
  <div class="inner-header"> <img src="{{ URL::to('img/AnnotationTool_logo.jpg') }}" alt="AnnotationTool Logo" class="logo logo-nav">
    <nav class="main-nav js--main-nav">
      <ul>
        @if (Auth::check())
        <li><a href="/user-page/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a></li>
        @endif
        <li><a href="/logout">Logout</a></li>
        <li><a href="/info">Info</a></li>
      </ul>
      <div class="search-nav">
        @if(Request::is('annotations'))
          <i class="ion-ios-search-strong"></i>
          <input type="search">
        @elseif(Request::is('annotations/upload-domain'))
          <a href="/annotations">Back</a>
        @endif
      </div>
    </nav>
    <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a> </div>
</header>
