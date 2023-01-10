<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @include('partials.css.css')
</head>

<body>
    {{-- layouts --}}
    @include('partials.welcome.navbar-welcome')

    {{-- Breaks --}}
    @include('partials.break')

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('partials.footer')

    {{-- javascript --}}
    @include('partials.js.js')
</body>

</html>
