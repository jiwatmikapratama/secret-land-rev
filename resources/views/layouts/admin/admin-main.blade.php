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
    @include('partials.admin.navbar-admin')

    {{-- content --}}
    @yield('content')

    {{-- Breaks --}}
    @include('partials.break')

    {{-- javascript --}}
    @include('partials.js.js')

    {{-- Footer --}}
    @include('partials.footer')
</body>

</html>
