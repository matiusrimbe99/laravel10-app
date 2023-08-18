@extends('layouts.app')
@section('title', "Blog: $post->title")
@section('content')
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">Matius Rimbe</a></p>

        <p>{{ $post->content }}</p>
        <hr>

        <p class="text-muted">{{ $total_comments }} Komentar</p>
        @foreach ($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach
    </article>
    <a href="{{ url('posts') }}" class="btn btn-warning">
        < Kembali</a>
        @endsection
