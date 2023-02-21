<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Satuan Penjamin Mutu') }}</title>

    <!-- Styles -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/aos/aos.css" rel="stylesheet">
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <!-- Scripts -->

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">

                <h1>SPM<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Visi Misi</a></li>
                            <li><a href="#">Road Map</a></li>
                            <li><a href="#">Tim</a></li>
                        </ul>
                    </li>
                    <li><a href="#about">Layanan</a></li>
                    <li class="dropdown"><a href="#"><span>Dokumen</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Dokumen Standar</a></li>
                            <li><a href="#">Dokumen Manual</a></li>
                            <li><a href="#">Dokumen Formulir</a></li>
                            <li><a href="#">Dokumen Kebijakan</a></li>
                            <li><a href="#">Dokumen Pedoman</a></li>
                            <li><a href="#">Dokumen Surat Keputusan</a></li>
                            <li><a href="#">Dokumen Audit</a></li>
                            <li><a href="#">Dokumen RTM</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-login" href="#">
                Masuk
                <i class="bi bi-box-arrow-in-right ms-1"></i>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    @yield('content')

    <!-- Scripts -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>
