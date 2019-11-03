@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pace.css') }}">
@endsection

@section('content')
  <script>document.body.className += ' fade-out';</script>
  @include('layouts.main-header')

  @if (Auth::user()->isAdmin())
    @include('layouts.ontology-filters-admin')
  @else
    @include('layouts.ontology-filters')
  @endif

<section class="section-images js--section-images">
  <div class="images-showcase clearfix">
      @include('layouts.images-showcase')
 </div>
</section>
@include('layouts.footer')

@endsection

@section('page-scripts')
  <script src="{{ asset('js/pace.min.js') }}"></script>
  <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
  <script>
    // STICKY NAV
    $('.js--section-images').waypoint(function(direction) {
      if (direction == "down") {
        $('.inner-header').addClass('sticky animated fadeIn');
      } else {
        $('.inner-header').removeClass('sticky animated fadeIn');
      }
    }, {
      offset: '60px;'
    });
  </script>
  <script>
    $(function() {
      $.scrollUp({
        scrollText: '<i class="ion-chevron-up"></i>',
        scrollDistance: 350,
        scrollFrom: 'bottom'
      });
    });
  </script>
  <script>
    $('#select-domain').on('change', function(e) {

      var selected_domain = e.target.value;

      if (selected_domain == 0) {
        location.reload();
      } else {
        $.get('/dataset-filter?selected_domain=' + selected_domain, function(data) {
            $('.images-showcase').html(data.view);
          })
          .done(function(data) {
            console.log('dataset filter')
          });
      }
    });
  </script>
  <script>
    $('#order-by').on('change', function(e) {

      var order_by = e.target.value;

      $.get('/annotation-filter?order_by=' + order_by, function(data) {
          $('.images-showcase').html(data.view);
        })
        .done(function(data) {
          console.log('annotation filter')
        });
    });
  </script>
@endsection
