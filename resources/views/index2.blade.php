@extends('layouts.lay')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Index kedua</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
    
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> -->
    <!-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script> -->
</head>
<body style="padding:5%;">
    @section('content')
    
    <a href="{{route('buku.create')}}" class="btn btn-primary">Tambah Buku</a> <br>
    @if (Session::has('Create'))
    {{Session::get('Create')}}
    @endif
    @if (Session::has('Update'))
    {{Session::get('Update')}}
    @endif
    @if (Session::has('Delete'))
    {{Session::get('Delete')}}
    @endif
    <table class="table table-stripped datatable" id="datatable">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>price</th>
                <th>date published</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataBuku as $buku)
            <tr>
                <td>{{$buku->id}}</td>
                <td>{{$buku->judul}}</td>
                <td>{{$buku->penulis}}</td>
                <td>{{"RP.".number_format($buku -> harga,2,',','.')}}</td>
                    <td>{{\Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y')}}</td>
                    <td> <button href="/buku/{{$buku->id}}">Detail</button> </td>
                    <!-- <td>
                        <form action="{{route('buku.destroy', $buku -> id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button onclick="return confirm('hapus dick?')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('buku.edit', $buku -> id)}}">Ubah Pri</a>
                         <form method="post" href="{{route('buku.edit', $buku->id)}}">
                            <button type="submit">Ubah Pri</button>
                        </form> -->
                    <!-- </td>
                    <td>
                        </td> -->
                    <!-- </tr> --> 
                    @endforeach
                </tbody>
    </table>
    <h1>Total Books : {{$jumlahBuku}}</h1>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
    @endsection
</body>
</html>