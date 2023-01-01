<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Land | {{ $title }}</title>
    @include('partials.css.css')
</head>

<body>
    {{-- navbar --}}
    @include('partials.user.navbaruser')

    {{-- content --}}
    @yield('content')

    @include('partials.footer')
    {{-- javascript --}}
    @include('partials.js.js')
</body>

</html>
