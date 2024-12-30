<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico')}} ">

    @stack('prepend-style')
    @include('includes.style')
    @stack('style')

</head>

<body>
    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    @stack('preepend-script')
    @include('includes.script')
    @stack('script')
</body>

</html>