<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inready Workgroup</title>
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body>
    @include('partials.user.header')
    @yield('body')
    @yield('sripts')
    @include('partials.user.footer')
</body>
</html>