<!-- upload.blade.php -->
<html>

<head>
    <title>Upload Video</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container">
        <div class="left-div">
            <form method="post" action="{{ route('insert.file') }}" enctype="multipart/form-data">
                @csrf
                <label for="video">Video:</label>
                <input type="file" name="video" id="video" />
                <br>

                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" />
                <br>

                <label for="deskripsi">Deskripsi:</label>
                <input type="text" name="deskripsi" id="deskripsi" />
                <br>

                <label for="album">Album:</label>
                <input type="text" name="album" id="album" />
                <br>

                <label for="artist">Artist:</label>
                <input type="text" name="artist" id="artist" />
                <br>

                <p>
                    @if($errors->has('video'))
                    {{ $errors->first('video') }}
                    @endif
                </p>

                <input type="submit" name="click" value="Upload" class="btn-upload" />
            </form>
        </div>

        <div class="right-div">
            <div class="video-list">
                @foreach($videos as $video)
                <div class="video-item">
                    <div class="video-info">
                        <h3>{{ $video->nama }}</h3>
                        <p>{{ $video->deskripsi }}</p>
                        <p>Album: {{ $video->album }}</p>
                        <p>Artist: {{ $video->artist }}</p>
                    </div>
                    <div class="video-actions">
                        <form method="GET" action="{{ route('edit.file', ['file_id' => $video->id]) }}">
                            <button type="submit" class="btn-edit">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('delete.file', ['file_id' => $video->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>