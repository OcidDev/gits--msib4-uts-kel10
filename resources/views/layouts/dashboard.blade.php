<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    {{-- <meta name="twitter:description" content="tesetstes">
    <meta name="twitter:image" content="assets/img/dogs/image3.jpeg">
    <meta name="description" content="testestes">
    <meta property="og:image" content="assets/img/dogs/image3.jpeg">
    <meta name="twitter:title" content="testestes"> --}}
    @stack('before-style')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    @stack('after-style')
</head>

<body id="page-top">
    <div id="wrapper">

        @include('includes.side-navbar')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('includes.top-navbar')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('includes.footer')

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    @stack('befor-script')
    <script src="assets/js/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    @stack('after-script')
    <!-- <script src="assets/js/chart.min.min.js"></script>  -->
</body>

</html>
