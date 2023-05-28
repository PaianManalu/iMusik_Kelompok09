<!-- resources/views/playlists/create.blade.php -->
<h2>Tambah Daftar Putar Baru</h2>

<form action="{{ route('playlists.store') }}" method="POST">
    @csrf
    <label for="name">Nama Daftar Putar:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Simpan</button>
</form>