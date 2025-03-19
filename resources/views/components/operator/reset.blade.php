<form action="{{ route('operator.verval.reset') }}" method="post">
    @csrf
    <input type="hidden" name="nisn" value="{{ $query->nisn }}">
    <button type="button" class="btn btn-sm btn-danger konfirmasi"><i
            class="mdi mdi-delete-empty me-1"></i></button>
</form>
