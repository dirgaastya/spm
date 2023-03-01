@extends('layouts.app')
@section('title', 'Tambah Dokumen')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Dokumen</h1>
            <a href="{{ route('dokumen.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Kembali
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form </h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                    action="{{ route('dokumen.update', $data->no) }}">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Dokumen</p>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Dokumen" value="{{ $data->nama }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" accept="application/pdf" id="formFile" name="dokumen">
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Jenis Dokumen</p>
                            <select type="text" class="form-control form-select" id="jenis" name="jenis"
                                value="{{ $data->no_jenis_dokumen }}">
                                <option selected disabled>Pilih Jenis Dokumen</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->no }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Kegiatan</p>
                            <select type="text" class="form-control form-select" id="kegiatan" name="kegiatan"
                                value="{{ $data->no_kegiatan }}">
                                <option selected disabled>Pilih Kegiatan</option>
                                @foreach ($kegiatan as $item)
                                    <option value="{{ $item->no }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Unit</p>
                            <select type="text" class="form-control form-select" id="unit" name="unit"
                                value="{{ $data->no_unit }}">
                                <option selected disabled>Pilih Unit</option>
                                @foreach ($unit as $item)
                                    <option value="{{ $item->no }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Status</p>
                            <select type="text" class="form-control form-select" id="status" name="status"
                                value="{{ $data->status }}">
                                <option selected disabled>Pilih Status</option>
                                <option value="1" {{ $data->status === 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $data->status === 0 ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
