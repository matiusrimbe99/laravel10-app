<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Post {{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>

<body>
    <div class="container">
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
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
</body>

</html>
