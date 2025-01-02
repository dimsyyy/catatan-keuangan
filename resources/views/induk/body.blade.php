<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">
</head>
<body>
    @include('partial.navbar')

    @yield('isi')

    <script src="https://kit.fontawesome.com/29c53c391a.js" crossorigin="anonymous"></script>
    
</body>
</html>