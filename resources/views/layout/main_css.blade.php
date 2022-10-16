    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title }}</title>
    <!-- Custom CSS -->
    <link href="{{ asset('vendor/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">