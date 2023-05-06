<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <nav class="container">
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('main') }}">Main</a></li>
            <li class="list-group-item"><a href="{{ route('about') }}">About</a></li>
            <li class="list-group-item"><a href="{{ route('post') }}">Post</a></li>
            <li class="list-group-item"><a href="{{ route('contact') }}">Contacts</a></li>
        </ul>
    </nav>

    @yield('content')
</body>
</html>
