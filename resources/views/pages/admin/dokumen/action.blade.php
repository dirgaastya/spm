<form action="{{ route('dokumen.destroy', $no) }}" method="Post" class="d-flex" id="delete-form">
    <a class="btn me-1 btn-info" href="{{ route('dokumen.show', $nama_file) }}">Show</a>
    <a class="btn me-1 btn-primary" href="{{ route('dokumen.edit', $no) }}">Edit</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete">
        Hapus
    </button>
</form>
