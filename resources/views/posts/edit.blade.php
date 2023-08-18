@extends('layouts.app')
@section('title', 'Ubah Postingan')
@section('content')

    <h1>Ubah Postingan Baru</h1>
    <form action="{{ url("posts/$post->id") }}" method="POST" class="form-control">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Konten</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Konten"
                value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Masukkan konten">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mb-3">Ubah</button>
        <a class="btn btn-warning mb-3" href="{{ url('posts') }}">Batal</a>
    </form>

    <form method="POST" action="{{ url("posts/$post->id") }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus Data</button>
    </form>
@endsection
