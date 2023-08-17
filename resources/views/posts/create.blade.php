<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Buat Postingan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <h1>Buat Postingan Baru</h1>
        <form action="{{ url('posts') }}" method="POST" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Konten</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Masukkan Judul Konten">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Masukkan konten"></textarea>
            </div>
            <button type="submit" class="btn btn-success mb-3">Simpan</button>
            <a class="btn btn-danger mb-3" href="{{ url('posts') }}">Batal</a>
        </form>
    </div>
    <script src="{{ asset('bootstrap-5/js/bootstrap.min.js') }}"></script>
</body>

</html>
