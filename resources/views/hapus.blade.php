<!-- hapus.blade.php -->
<html>

<head>
    <title>Hapus Video</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container">
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
                    <form method="POST" action="{{ route('delete.file', ['file_id' => $video->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete