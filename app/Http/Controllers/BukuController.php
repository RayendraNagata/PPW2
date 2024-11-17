<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Pagination\Paginator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useBootstrapFive();
        $batas = 10;
        $jumlahBuku = Buku::count();
        $dataBuku = Buku::orderBy('id', 'asc') -> paginate($batas);
        $number = $batas * ($dataBuku->currentPage() -1);

        return view('index', compact('dataBuku', 'number', 'jumlahBuku'));
    }

    public function index2()
    {
        $dataBuku = Buku::all();
        $jumlahBuku = Buku::count();
        return view('index2', compact('dataBuku', 'jumlahBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);
        
        $buku = new Buku();
        $buku -> judul = $request-> judul;
        $buku -> penulis = $request-> penulis;
        $buku -> harga = $request-> harga;
        $buku -> tgl_terbit = $request-> tgl_terbit;
        $buku -> save();

        return redirect('/buku') -> with('Create', "buku berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request-> validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);


        $buku = Buku::find($id);
        $buku ->judul = $request -> judul;
        $buku ->penulis = $request -> penulis;
        $buku ->harga = $request -> harga;
        $buku ->tgl_terbit = $request -> tgl_terbit;
        $buku -> save();

        return redirect('/buku') -> with('Update', "buku {$id} berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku') -> with('Delete', "buku {$id} berhasil dihapus");
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request -> cari;
        $dataBuku = Buku::where('judul', 'like', '%'. $cari. '%') -> orWhere('penulis', 'like', '%'. $cari. '%') -> paginate($batas);
        $jumlahBuku = Buku::count();
        $number = $batas * ($dataBuku->currentPage() -1);

        return view('search', compact('dataBuku', 'number', 'jumlahBuku', 'cari'));
    }
}
