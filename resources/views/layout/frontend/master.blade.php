<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <title>@yield('title')</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>

@include('layout.frontend.header')

@yield('content')


@include('layout.frontend.footer')

@yield('scripts')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
