@extends('layouts.guest')
@section('title', 'Home')
@section('content')
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="text-center">
                <h2 data-aos="fade-up">Selamat Datang Di Website</h2>
                <p data-aos="fade-up" data-aos-delay="100">Satuan Penjamin Mutu</p>
            </div>
        </div>
    </section>
    <section id="list-doc" class="list-doc ">
        <div class="container">
            <h3 data-aos="fade-in" data-aos-delay="400" class="fw-bold mb-5 text-center text-lg-start">Daftar Dokumen</h3>
            <div class="row px-3 gap-lg-4 justify-content-center justify-content-lg-between ">
                @foreach ($data as $item)
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                        class="col-12 col-lg-4 card-doc mb-3 shadow p-3 d-flex" style="width: 540px;">
                        <img src="https://spm.itenas.ac.id/frontend/assets/img/spm/Laporan-Hasil-Audit-web.jpg"
                            class="card-doc-img" alt="...">
                        <div class="card-doc-body d-flex flex-column justify-content-center py-4 px-3 px-md-5">
                            <h5 class="card-doc-title mb-3 fs-5 fs-md-4">Dokumen {{ $item->nama }}</h5>

                            <a href="{{ route('dokumen', $item->id) }}" class="btn-doc text-center">Lihat selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
