@extends('layouts.guest')
@section('title', 'Dokumen')
@push('styles')
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
@endpush
@section('content')
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="text-center">
                <h2 data-aos="fade-up" class="text-capitalize">Dokumen {{ $jenis->nama }}</h2>
                <p data-aos="fade-up" data-aos-delay="100">SPM</p>
            </div>
        </div>
    </section>
    <section id="dokumen">
        <div class="container">
            <table data-aos="fade-in" class="table table-hover dokumen_datatable" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen {{ $jenis->nama }}</th>
                        <th>Kegiatan</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('.dokumen_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('guest.dokumen.get-data', $slug) }}",
                    type: "GET"
                },
                columns: [{
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },

                    {
                        data: 'kegiatan.nama',
                        name: 'kegiatan'
                    },
                    {
                        data: 'unit.nama',
                        name: 'unit'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },


                ],
                columnDefs: [{
                        "searchable": false,
                        "orderable": false,
                        "targets": 0,
                    },
                    {
                        "render": function(data, type, row) {
                            return (data === 1) ? 'Aktif' : 'Tidak Aktif';
                        },
                        "targets": 4
                    }

                ],
                order: [
                    [1, 'asc']
                ]
            });

            table.on('order.dt search.dt', function() {
                let i = 1;

                table.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>
@endpush
