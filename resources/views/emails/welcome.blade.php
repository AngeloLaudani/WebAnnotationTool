<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/grid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

  <div class="container">

    <img src="{{ URL::to('img/AnnotationTool_logo.jpg') }}" alt="AnnotationTool Logo" class="logo logo-nav">
    <section>
      <h2>Welcome {{ $user->name }}</h2>
    </section>

  </div>

</body>

</html>
