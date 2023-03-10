<form action="{{ route('unit.destroy', $no) }}" method="Post" class="d-flex" id="{{ 'delete-form-' . $no }}">
    <a class="btn me-1 btn-primary" href="{{ route('unit.edit', $no) }}">Edit</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete{{ '-' . $no }}">
        Hapus
    </button>
</form>

<div class="modal fade" id="Delete{{ '-' . $no }}" tabindex="-1" aria-labelledby="DeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteLabel">Hapus Unit?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h6 class="text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i> Peringatan
                    </h6>
                    <p class="text-danger" style="font-size:0.9em;">
                        Semua <strong>dokumen</strong> yang bersangkutan dengan
                        unit ini akan terhapus.
                    </p>
                    <p class="text-danger" style="font-size:0.9em;">
                        Apakah anda yakin menghapus <strong>unit {{ $nama }}</strong> ?
                        <br>
                        Anda tidak dapat membatalkannya.
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <a onclick="event.preventDefault();
                document.getElementById('{{ 'delete-form-' . $no }}').submit();"
                    class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
