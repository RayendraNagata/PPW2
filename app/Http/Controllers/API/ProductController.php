<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Mendapatkan semua produk
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Membuat produk baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Membuat produk
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // Menampilkan produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            // Validasi data
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'price' => 'sometimes|required|numeric',
            ]);

            $product->update($request->all());

            return response()->json($product);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return response()->json(['message' => 'Produk berhasil dihapus']);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }
}
