<form method="POST" action="{{ route('delete.file', ['file_id' => $file->id]) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Hapus</button>
</form>