<form action="{{ route('dokumen.destroy', $no) }}" method="Post" class="d-flex">
    <a class="btn me-1 btn-info" href="{{ route('dokumen.show', $nama_file) }}">Show</a>
    <a class="btn me-1 btn-primary" href="{{ route('dokumen.edit', $nama_file) }}">Edit</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn me-1 btn-danger">Delete</button>
</form>
