<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Matius Rimbe</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <h1>Blog Matius Rimbe
            <a href="{{ url('posts/create') }}" class="btn btn-success">+ Buat Postingan</a>
        </h1>


        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated at
                            {{ $post->created_at }}</small>
                    </p>
                    <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Selengkapnya...</a>
                    <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit Data</a>
                </div>
            </div>
        @endforeach

    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
</body>

</html>
