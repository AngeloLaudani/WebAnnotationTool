@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/annotorious.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltipster.bundle.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltipster-sideTip-light.min.css') }}">
@endsection

@section('title', '| Annotate')

@section('content')

  <script>
    document.body.className += ' fade-out';
  </script>

  <div class="annotation-box-dt"> <img src="{{ asset('storage/datasets/'.$dataset->dataset_name.'/'.$image->path) }}" class="annotation-image annotatable js--wp-11" alt="{{ $image->path }}" /></div>

  @include('layouts.details-form')


@endsection

@section('page-scripts')
  <script src="{{ asset('js/annotorious.min.js') }}"></script>
  <script src="{{ asset('js/tooltipster.bundle.min.js') }}"></script>
  @if($dataset->domain->type == 'segmentation')
    @include('scripts.polygon-script')
  @endif
  <script>

      var image_id = {{ $image->id }};

      $.get('/load-last-annotation?image_id=' + image_id, function(box) {

          console.log("loading last annotation");
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
            editable: false
          };
          anno.addAnnotation(myAnnotation);
          anno.highlightAnnotation(myAnnotation);
          $('#annotation-form').append('<select name="box_id" class="hide"><option value="' + box.id + '"></option></select>');

      });
  </script>
  @if($domain->owl_path != null)
    @include('scripts.owl-scripts')
  @else
    @include('scripts.ontology-scripts')
  @endif

@endsection
