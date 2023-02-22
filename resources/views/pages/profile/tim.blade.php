@extends('layouts.guest')
@section('title', 'Tim')
@section('content')
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="text-center">
                <h2 data-aos="fade-up">TIM</h2>
                <p data-aos="fade-up" data-aos-delay="100">SPM</p>
            </div>
        </div>
    </section>
    <section id="team">
        <div class="container">
            <div data-aos="fade-up" data-aos-delay="400" class="article-header  mb-5 text-center text-lg-start">
                <h3 class="fw-bold">
                    Tim Pengelola
                </h3>
                <p>
                    Berikut ini adalah tim pengelola
                </p>
            </div>
            <div class="row gap-2 gap-lg-4 px-3 justify-content-center justify-content-md-between">
                @foreach ($data as $item)
                    <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                        class="card-team align-items-center col-sm-6 col-md-3 card-doc shadow p-3 ">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                alt="avatar">
                        </div>
                        <div class="text-center">
                            <h3 class="my-1 fw-bold">Danny McLoan</h5>
                                <p class="fw-light">Senior Journalist</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div data-aos="fade-up" data-aos-delay="400" class="article-header  my-5 text-center text-lg-start">
                <h3 class="fw-bold">
                    Tim Auditor Internal
                </h3>
                <p>
                    Berikut ini adalah tim auditor internal
                </p>
            </div>

            <ol data-aos="fade-in" class="fw-bold">
                @for ($i = 0; $i <= 15; $i++)
                    <li> Danny McLoan</li>
                @endfor
            </ol>
        </div>
    </section>
@endsection
