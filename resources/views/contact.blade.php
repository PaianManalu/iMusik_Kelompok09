@extends('layouts.app')

@section('content')
<h1>Kontak Kami</h1>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('contact.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="message">Pesan</label>
        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
</form>
@endsection