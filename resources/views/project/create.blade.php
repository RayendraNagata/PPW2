<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h4>Tambah Project</h4>
        <form action="{{route('project.store')}}" method="post">
            @csrf
            <div>Judul <input type="text" name="judul"></div>
            <div>
                @error('judul')
                    {{$message}}
                @enderror
            </div>
            <div>Tanggung Jawab <input type="text" name="responsibility"></div>
            <div>
                @error('responsibility')
                    {{$message}}
                @enderror
            </div>
            <div>Tanggal Project <input type="date" name="tanggal"></div>
            <div>
                @error('tanggal')
                    {{$message}}
                @enderror
            </div>

            <button type="submit">Simpan</button>
            <a href="{{route('project.index')}}">Kembali</a>
        </form>
    </div>
</body>
</html>