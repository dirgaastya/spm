@extends('layouts.guest')
@section('title', 'Dokumen')
@section('content')
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="text-center">
                <h2 data-aos="fade-up">Dokumen {{ $data[0]->kategori->nama }}</h2>
                <p data-aos="fade-up" data-aos-delay="100">SPM</p>
            </div>
        </div>
    </section>
    <section id="dokumen">
        <div class="container">
            <table data-aos="fade-in" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Dokumen</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>
                                <a href="#" class="btn btn-show"><i class="bi bi-eye text-white"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 d-flex justify-content-end">
                {{ $data->links('vendor.pagination') }}
            </div>

        </div>
    </section>
@endsection
