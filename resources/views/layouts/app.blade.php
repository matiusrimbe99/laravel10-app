<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>

<body>
    @include('layouts.app.header')

    <div class="container">
        @yield('content')

        @include('layouts.app.footer')
    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
</body>

</html>
