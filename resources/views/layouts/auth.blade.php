<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}" />

    @stack('prepend-styles')

    <link rel="stylesheet" href="{{asset('assets/fonts/typicons/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.custom.css')}}">

    @stack('styles')

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <a href="{{route("home")}}">
                                    <img src="{{asset('/assets/img/logo/logo.png')}}" alt="logo">
                                </a>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @stack('preepend-script')
    <script src="{{ asset('assets/js/dashboard/vendor.bundle.base.js')}}"></script>
    <script src='{{ asset("assets/js/dashboard/off-canvas.js") }}'></script>
    <script src='{{ asset("assets/js/dashboard/hoverable-collapse.js") }}'></script>
    <script src='{{ asset("assets/js/dashboard/template.js") }}'></script>
    <script src='{{ asset("assets/js/dashboard/settings.js") }}'></script>
    <script src='{{ asset("assets/js/dashboard/todolist.js") }}'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
