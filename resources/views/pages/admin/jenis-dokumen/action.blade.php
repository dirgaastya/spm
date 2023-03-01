<form action="{{ route('jenis-dokumen.destroy', $no) }}" method="Post" class="d-flex">
    <a class="btn me-1 btn-primary" href="{{ route('jenis-dokumen.edit', $no) }}">Edit</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="btn me-1 btn-danger">Delete</button>
</form>
