@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('nav-title', 'Manajemen Produk')

@section('content')

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 24px;">
        <h1 style="font-size: 26px; font-weight: 700; color: #1f2937; margin:0;">Katalog Produk</h1>
        <a href="{{ route('products.create') }}" class="btn-add" style="padding: 10px 18px; font-size: 14px; border-radius: 10px;">
            + Tambah Produk Baru
        </a>
    </div>

    {{-- ASUMSI: $products tersedia dan memiliki field 'store_name' --}}
    @if(empty($products) || count($products) == 0)
        <div class="center" style="padding: 40px; border: 2px dashed #d1d5db; border-radius: 12px; margin-top: 20px; background: #f9fafb;">
            <p style="color: var(--muted); font-size: 16px;">
                Belum ada produk yang terdaftar. Saatnya menambah produk unggulan Anda!
            </p>
        </div>
    @else
        <div class="table-wrap">
            <table style="width:100%;border-collapse:collapse;margin-top:12px;">
                <thead>
                    <tr>
                        <th style="width: 5%; border-top: 1px solid #eef2f7;">ID</th>
                        <th style="width: 15%; border-top: 1px solid #eef2f7;">Toko</th> {{-- KOLOM BARU --}}
                        <th style="width: 20%; border-top: 1px solid #eef2f7;">Nama</th>
                        <th style="width: 15%; border-top: 1px solid #eef2f7;">Harga</th>
                        <th style="width: 30%; border-top: 1px solid #eef2f7;">Deskripsi</th>
                        <th style="width: 15%; border-top: 1px solid #eef2f7;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:center">{{ $p->id }}</td>
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:left"><strong>{{ $p->store_name }}</strong></td> {{-- MENAMPILKAN NAMA TOKO --}}
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:left">{{ $p->name }}</td>
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:right">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:left; font-size: 13px;">{{ Str::limit($p->description, 50) }}</td> {{-- Dipotong agar tidak terlalu panjang --}}
                        <td style="border:1px solid #d1d1d1;padding:10px;text-align:center">
                            <a href="{{ route('products.edit', $p->id) }}" class="btn-edit" style="margin-right:6px;">Edit</a>

                            <form action="{{ route('products.destroy', $p->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection