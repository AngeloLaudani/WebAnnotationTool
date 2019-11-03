@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/annotorious.css') }}">
@endsection

@section('title', '| Annotate')

@section('content')

  <div class="annotation-box">
    <img src="{{ asset('storage/datasets/'.$dataset->dataset_name.'/'.$image->path) }}" class="annotation-image annotatable js--wp-9" alt="Annotation Image" />
      <div class="annotation-btn js--wp-10">
       <div class="btn btn-full show" id="hide-btn">Hide</div>
       <div class="btn btn-full hide" id="show-btn">Show</div>
       <br />
       <div id="next-btn">
         <h3>Annotate!</h3>
       </div>
      </div>
    <a href="/annotations">
      <div class="superbox-close"></div>
    </a>
  </div>

@endsection

@section('page-scripts')
  <script src="{{ asset('js/annotorious.min.js') }}"></script>
  @if($dataset->domain->type == 'segmentation')
    @include('scripts.polygon-script')
  @endif
  <script>
    setTimeout(function() {

      var image_id = {{ $image->id }};

      $.get('/load-annotation?image_id=' + image_id, function(data) {

        $.each(data, function(index, box) {

          console.log("loading annotations");
          var myAnnotation = {
            text: box.text,
            src: box.src,
            shapes: [{
              type: 'rect',
              geometry: {
                x: box.x,
                y: box.y,
                width: box.width,
                height: box.height
              }
            }],
            @if (Auth::user()->isAdmin())
               editable: true
            @else
              editable: false
            @endif
          };
          anno.addAnnotation(myAnnotation);

        });

      });
    }, 800);
  </script>
  <script>
    $('#hide-btn').on('click', function(e) {
      anno.hideAnnotations();
      $('#show-btn').removeClass('hide').addClass('show');
    	$('#hide-btn').removeClass('show').addClass('hide');
    });
    $('#show-btn').on('click', function(e) {
      anno.showAnnotations();
      $('#hide-btn').removeClass('hide').addClass('show');
    	$('#show-btn').removeClass('show').addClass('hide');
    });
  </script>
  <script>
    anno.addHandler('onAnnotationCreated', function(annotation) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var image_id = {{ $image->id }};
      var teks = annotation.text;
      var context = annotation.src;
      var x = annotation.shapes[0].geometry.x;
      var y = annotation.shapes[0].geometry.y;
      var width = annotation.shapes[0].geometry.width;
      var height = annotation.shapes[0].geometry.height;


      $.post('/create-annotation', {
          image_id: image_id,
          teks: teks,
          context: context,
          x: x,
          y: y,
          width: width,
          height: height
        })
        .done(function(data) {
          console.log(data)
        });

        $('#next-btn').empty();
        $('#next-btn').append('<a class="btn btn-full" href="/annotation-details/{{ $image->id }}">Next</a>');

    });
  </script>
  <script>
    anno.addHandler('onAnnotationRemoved', function(annotation) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var image_id = {{ $image->id }};
      var teks = annotation.text;
      var context = annotation.src;
      var x = annotation.shapes[0].geometry.x;
      var y = annotation.shapes[0].geometry.y;
      var width = annotation.shapes[0].geometry.width;
      var height = annotation.shapes[0].geometry.height;


      $.post('/remove-annotation', {
          image_id: image_id,
          teks: teks,
          context: context,
          x: x,
          y: y,
          width: width,
          height: height
        })
        .done(function(data) {
          console.log(data)
        });

    });
  </script>
  <script>
    anno.addHandler('onAnnotationUpdated', function(annotation) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      var image_id = {{ $image->id }};
      var teks = annotation.text;
      var context = annotation.src;
      var x = annotation.shapes[0].geometry.x;
      var y = annotation.shapes[0].geometry.y;
      var width = annotation.shapes[0].geometry.width;
      var height = annotation.shapes[0].geometry.height;


      $.post('/update-annotation', {
          image_id: image_id,
          teks: teks,
          context: context,
          x: x,
          y: y,
          width: width,
          height: height
        })
        .done(function(data) {
          console.log(data)
        });

    });
  </script>
@endsection
