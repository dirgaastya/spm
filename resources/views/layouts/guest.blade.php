<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Satuan Penjamin Mutu') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/datatable/datatables.min.css" rel="stylesheet">
    <link href="/vendor/datatable/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="/vendor/aos/aos.css" rel="stylesheet">
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!-- Scripts -->
    @stack('styles')
</head>

<body>
    @include('layouts.guest.header')
    @yield('content')
    @include('layouts.guest.footer')

    <!-- Scripts -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/vendor/datatable/datatables.min.js"></script>
    <script src="/vendor/datatable/dataTables.bootstrap5.js"></script>
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>
    @stack('scripts')
    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>
