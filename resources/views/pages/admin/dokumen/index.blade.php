@extends('layouts.app')
@section('title', 'List Dokumen')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Dokumen</h1>
            <a href="{{ route('dokumen.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah
                Dokumen</a>
        </div>
        @if (Session::has('alert-success'))
            <div class="alert alert-success">
                {{ Session::get('alert-success') }} </div>
        @elseif (Session::has('alert-danger'))
            <div class="alert alert-danger">
                {{ Session::get('alert-danger') }} </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                <th>Jenis Dokumen</th>
                                <th>Kegiatan</th>
                                <th>Status</th>
                                <th>Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->no }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenisDokumen->nama }}</td>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>{{ $item->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>
                                        <form action="POST">
                                            {{ csrf_field() }}
                                            <a class="btn btn-info" href="{{ route('dokumen.edit', $item->no) }}">
                                                Show
                                            </a>
                                            <a class="btn btn-warning" href="{{ route('dokumen.edit', $item->no) }}">
                                                Edit
                                            </a>
                                            <button class="btn btn-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
