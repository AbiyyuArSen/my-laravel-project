@extends('layouts.app')

@section('title', 'Dashboard')

@section('nav-title', 'Sena Store')

@section('content')

    <div style="margin-bottom: 40px;">
        <h1 style="font-size: 32px; font-weight: 700; color: #111827; margin:0 0 8px 0;">Selamat Datang 👋</h1>
        <p style="color: var(--muted); font-size: 16px; margin:0;">Kelola produk Anda dengan mudah dan cepat</p>
    </div>

    {{-- STATISTICS CARDS --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 40px;">
        
        {{-- Total Produk Card --}}
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; padding: 24px; color: white; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <p style="margin: 0 0 8px 0; opacity: 0.9; font-size: 14px;">Total Produk</p>
                    <h3 style="margin: 0; font-size: 36px; font-weight: 700;">{{ $products->count() }}</h3>
                </div>
                <div style="font-size: 48px;">📦</div>
            </div>
        </div>

        {{-- Total Harga Card --}}
        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 12px; padding: 24px; color: white; box-shadow: 0 10px 30px rgba(245, 87, 108, 0.2);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <p style="margin: 0 0 8px 0; opacity: 0.9; font-size: 14px;">Total Nilai Stok</p>
                    <h3 style="margin: 0; font-size: 28px; font-weight: 700;">Rp {{ number_format($products->sum('price'), 0, ',', '.') }}</h3>
                </div>
                <div style="font-size: 48px;">💰</div>
            </div>
        </div>

        {{-- Produk Aktif Card --}}
        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 12px; padding: 24px; color: white; box-shadow: 0 10px 30px rgba(79, 172, 254, 0.2);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <p style="margin: 0 0 8px 0; opacity: 0.9; font-size: 14px;">Produk Aktif</p>
                    <h3 style="margin: 0; font-size: 36px; font-weight: 700;">{{ $products->count() }}</h3>
                </div>
                <div style="font-size: 48px;">✅</div>
            </div>
        </div>

    </div>

    {{-- MENU CARDS --}}
    <div style="margin-bottom: 30px;">
        <h2 style="font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 16px 0;">Menu Utama</h2>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
        
        {{-- Daftar Produk Card --}}
        <div style="background: white; border-radius: 12px; padding: 28px; box-shadow: 0 10px 30px rgba(16,24,40,0.06); transition: all .3s ease; border: 2px solid transparent; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 15px 40px rgba(16,24,40,0.1)'; this.style.borderColor='var(--accent)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(16,24,40,0.06)'; this.style.borderColor='transparent'">
            <div style="font-size: 48px; margin-bottom: 16px;">📋</div>
            <h3 style="font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 8px 0;">Daftar Produk</h3>
            <p style="color: var(--muted); font-size: 14px; margin: 0 0 16px 0;">Lihat semua produk yang telah dibuat</p>
            <a href="{{ route('products.index') }}" style="display: inline-block; background: var(--accent); color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all .2s ease;" onmouseover="this.style.background='var(--accent-2)'; this.style.transform='translateX(4px)'" onmouseout="this.style.background='var(--accent)'; this.style.transform='translateX(0)'">
                Lihat Semua →
            </a>
        </div>

        {{-- Tambah Produk Baru Card --}}
        <div style="background: white; border-radius: 12px; padding: 28px; box-shadow: 0 10px 30px rgba(16,24,40,0.06); transition: all .3s ease; border: 2px solid transparent; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 15px 40px rgba(16,24,40,0.1)'; this.style.borderColor='var(--accent)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(16,24,40,0.06)'; this.style.borderColor='transparent'">
            <div style="font-size: 48px; margin-bottom: 16px;">➕</div>
            <h3 style="font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 8px 0;">Tambah Produk</h3>
            <p style="color: var(--muted); font-size: 14px; margin: 0 0 16px 0;">Buat produk baru untuk katalog Anda</p>
            <a href="{{ route('products.create') }}" style="display: inline-block; background: var(--accent); color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all .2s ease;" onmouseover="this.style.background='var(--accent-2)'; this.style.transform='translateX(4px)'" onmouseout="this.style.background='var(--accent)'; this.style.transform='translateX(0)'">
                Buat Baru →
            </a>
        </div>

        {{-- Kelola Produk Card --}}
        <div style="background: white; border-radius: 12px; padding: 28px; box-shadow: 0 10px 30px rgba(16,24,40,0.06); transition: all .3s ease; border: 2px solid transparent; cursor: pointer;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 15px 40px rgba(16,24,40,0.1)'; this.style.borderColor='var(--accent)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(16,24,40,0.06)'; this.style.borderColor='transparent'">
            <div style="font-size: 48px; margin-bottom: 16px;">⚙️</div>
            <h3 style="font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 8px 0;">Kelola Produk</h3>
            <p style="color: var(--muted); font-size: 14px; margin: 0 0 16px 0;">Edit dan hapus produk yang sudah ada</p>
            <a href="{{ route('products.index') }}" style="display: inline-block; background: var(--accent); color: white; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all .2s ease;" onmouseover="this.style.background='var(--accent-2)'; this.style.transform='translateX(4px)'" onmouseout="this.style.background='var(--accent)'; this.style.transform='translateX(0)'">
                Kelola →
            </a>
        </div>

    </div>

@endsection