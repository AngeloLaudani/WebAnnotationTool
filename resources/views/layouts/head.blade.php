<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- common styles -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/grid.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ionicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/queries.css') }}">
  <!-- page specific styles -->
  @yield('page-style')

  <title>AnnotationTool @yield('title')</title>
</head>
