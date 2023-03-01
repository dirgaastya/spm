@extends('layouts.app')
@section('title', 'Tambah Dokumen')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Jenis Dokumen</h1>
            <a href="{{ route('dokumen.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Kembali
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form </h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST"
                    action="{{ route('jenis-dokumen.update', $data->no) }}">
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
                            <p class="heading mb-1">Jenis Dokumen</p>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Nama Jenis Dokumen" value="{{ $data->nama }}">
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
