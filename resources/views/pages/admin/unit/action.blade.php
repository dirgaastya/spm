<form action="{{ route('unit.destroy', $no) }}" method="Post" class="d-flex" id="delete-form ">
    <a class="btn me-1 btn-primary" href="{{ route('unit.edit', $no) }}">Edit</a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete">
        Hapus
    </button>
</form>
