@extends('layouts.app')
@section('title', 'Tambah Dokumen')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Dokumen</h1>
            <a href="{{ route('dokumen.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Kembali
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form </h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('dokumen.store') }}">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Dokumen</p>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Dokumen" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Jenis Dokumen</p>
                            <select type="text" class="form-control form-select" id="jenis" name="jenis"
                                value="{{ old('jenis') }}">
                                <option selected disabled>Pilih jenis dokumen</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->no }}">{{ $item->nama }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Kegiatan</p>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                                placeholder="Nama Kegiatan" value="{{ old('kegiatan') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Unit</p>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="Nama Unit"
                                value="{{ old('unit') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <p class="heading mb-1">Status</p>
                            <select type="text" class="form-control form-select" id="status" name="status"
                                value="{{ old('status') }}">
                                <option selected disabled>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
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
