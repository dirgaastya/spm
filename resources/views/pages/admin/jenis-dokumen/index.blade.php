@extends('layouts.app')
@section('title', 'Jenis Dokumen')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Jenis Dokumen</h1>
            <a href="{{ route('jenis-dokumen.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                Tambah
                Jenis Dokumen</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Jenis Dokumen</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dokumen_datatable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Jenis Dokumen</th>
                                <th>Thumbnail</th>
                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('.dokumen_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('jenis-dokumen.data') }}",
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
@endpush
