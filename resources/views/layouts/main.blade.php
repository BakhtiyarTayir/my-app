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
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('main') }}" class="nav-link px-2 link-body-emphasis">Home</a></li>
                    <li><a href="{{ route('index') }}" class="nav-link px-2 link-body-emphasis">Post</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link px-2 link-body-emphasis">About</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link px-2 link-body-emphasis">Contacts</a></li>
                </ul>

            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
