<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}" />

    @stack('prepend-styles')
    @include('includes.dashboard.styles')
    @stack('styles')
</head>

<body>
    <div class="container-scroller">
        @include('includes.dashboard.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('includes.dashboard.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('preepend-scripts')
    @include('includes.dashboard.scripts')
    @stack('scripts')
</body>

</html>