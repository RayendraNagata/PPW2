@extends('layouts.lay')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
</head>
<body style="padding:5%;">
    @section('content')
        <a href="{{route('project.create')}}" class="btn btn-primary">Tambah Pengalaman</a>
        @if (Session::has('pesan'))
            {{Session::get('pesan')}}
        @endif

        <table class="table table-stripped datatable" id="datatablePro">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>Tanggung Jawab</th>
                    <th>tanggal project</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataProject as $project)
                    <tr>
                        <td>{{$project -> id}}</td>
                        <td>{{$project -> judul}}</td>
                        <td>{{$project -> responsibility}}</td>
                        <td>{{$project -> tgl_project}}</td>
                        <td>
                            <form action="{{route('project.destroy', $project -> id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="{{route('project.edit', $project -> id)}}">Ubah Data Project</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#datatablePro').DataTable();
            } );
        </script>
        <script>
            $(document).ready(function() {
                // Mencegah form submit secara default
                $('form').on('submit', function(e) {
                    e.preventDefault(); // Cegah form dari submit langsung
                    
                    const form = this; // Simpan referensi ke form

                    // Tampilkan SweetAlert konfirmasi
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Kirim form jika terkonfirmasi
                        }
                    });
                });
            });
        </script>

    @endsection
</body>
</html>