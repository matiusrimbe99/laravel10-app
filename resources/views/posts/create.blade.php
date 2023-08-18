@extends('layouts.app')
@section('title', 'Buat Postingan')
@section('content')
    <h1>Buat Postingan Baru</h1>
    <form action="{{ url('posts') }}" method="POST" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Konten</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Konten">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Masukkan konten"></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-3">Simpan</button>
        <a class="btn btn-danger mb-3" href="{{ url('posts') }}">Batal</a>
    </form>
@endsection
