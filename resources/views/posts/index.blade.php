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
            @php
                $post = explode(';', $post);
            @endphp
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post[1] }}</h5>
                    <p class="card-text">{{ $post[2] }}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated at {{ $post[3] }}</small>
                    </p>
                    <a href="{{ url('posts/' . $post[0]) }}" class="btn btn-primary">Selengkapnya...</a>
                </div>
            </div>
        @endforeach

    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
</body>

</html>
