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

});

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
