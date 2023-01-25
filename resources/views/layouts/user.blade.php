<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inready Workgroup</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @yield('styles')
    <script src="https://kit.fontawesome.com/e8b696d2f5.js" crossorigin="anonymous"></script>
</head>
<body x-data>
    @include('partials.user.header')
    @yield('body')
    @yield('sripts')
    @include('partials.user.footer')
</body>
</html>