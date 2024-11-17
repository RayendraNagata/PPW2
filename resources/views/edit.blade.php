<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h4>Tambah Buku</h4>
        <form action="{{route('buku.update', $buku -> id)}}" method="post">
            @csrf
            <div>Judul <input type="text" name="judul" value="{{$buku ->judul}}"></div>
            <div>
                @error('judul')
                    {{$message}}
                @enderror
            </div>
            <div>Penulis <input type="text" name="penulis" value="{{$buku -> penulis}}"></div>
            <div>
                @error('penulis')
                    {{$message}}
                @enderror
            </div>
            <div>Harga <input type="number" name="harga" value="{{$buku -> harga}}"></div>
            <div>
                @error('harga')
                    {{$message}}
                @enderror
            </div>
            <div>Tanggal Terbit <input type="date" name="tgl_terbit" value="{{$buku -> tgl_terbit}}"></div>
            <div>
                @error('tgl_terbit')
                    {{$message}}
                @enderror
            </div>
            <button type="submit">Simpan</button>
            <a href="{{'/buku'}}">Kembali</a>
        </form>
    </div>
</body>
</html>