@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('nav-title', 'Tambah Produk Baru')

@section('content')
    <h1 style="font-size: 26px; font-weight: 700; color: #1f2937; margin-bottom: 24px;">➕ Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST" style="max-width:600px;margin:0 auto; padding: 10px 0;">
        @csrf

        {{-- FIELD BARU: Nama Toko --}}
        <div>
            <label for="store_name">Nama Toko</label>
            <input type="text" id="store_name" name="store_name" value="{{ old('store_name') }}" placeholder="Masukkan Nama Toko" required>
        </div>
        
        {{-- Nama Produk (Menggunakan 'name', data akan dipetakan ke 'nama' di Controller) --}}
        <div>
            <label for="name">Nama Produk</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Produk" required>
        </div>

        {{-- Harga Produk --}}
        <div>
            <label for="price">Harga Produk</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Harga Produk" required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" placeholder="Deskripsi Produk" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-blue" style="width:100%; border:none; cursor:pointer; font-size:16px; margin-top:0;">Simpan Produk</button>
        </div>
    </form>

    <div style="text-align: center; margin-top: 15px;">
        <a href="{{ route('products.index') }}" class="btn" style="background:transparent; color:var(--accent); font-weight:600; box-shadow:none; padding:10px 0; margin-top:0;">
            ← Kembali ke Daftar Produk
        </a>
    </div>
@endsection