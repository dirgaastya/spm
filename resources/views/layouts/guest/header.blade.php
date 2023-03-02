<header id="header" class="header fixed-top d-flex align-items-center shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
        <a href={{ url('/') }} class="logo d-flex align-items-center me-auto me-lg-0">

            <h1>SPM<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href={{ url('/') }}>Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href={{ route('profile.sejarah') }}>Sejarah</a></li>
                        <li><a href={{ route('profile.visimisi') }}>Visi Misi</a></li>
                        <li><a href={{ route('profile.roadmap') }}>Road Map</a></li>
                        <li><a href={{ route('profile.tim') }}>Tim</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('layanan') }}">Layanan</a></li>
                <li class="dropdown"><a href="#"><span>Dokumen</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach ($jenisDokumen as $jenis)
                            <li><a href="{{ route('dokumen', $jenis->nama) }}">Dokumen {{ $jenis->nama }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->

        <div class="d-flex">
            <a class="btn-login" href="{{ url('/login') }}">
                Masuk
                <i class="bi bi-box-arrow-in-right ms-1"></i>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>

    </div>
</header>
