<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi data (menggunakan 'name' dan 'store_name' dari form)
        $data = $request->validate([
            'store_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 2. SINKRONISASI: Mengubah 'name' (input) menjadi 'nama' (kolom DB)
        $data['nama'] = $data['name']; 
        unset($data['name']); // Hapus kunci 'name' yang tidak dikenali DB

        Product::create($data); // Baris ini sekarang aman

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // 1. Validasi data
        $data = $request->validate([
            'store_name' => 'required|string|max:255', // Asumsi ada di form edit
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 2. SINKRONISASI: Mengubah 'name' (input) menjadi 'nama' (kolom DB)
        $data['nama'] = $data['name'];
        unset($data['name']);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}