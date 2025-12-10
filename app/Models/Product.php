<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; // Untuk Laravel 9+

class Product extends Model
{
    use HasFactory;

    // Mass assignment: Gunakan nama kolom DB yang sebenarnya (termasuk 'nama' dan 'store_name')
    protected $fillable = [
        'nama',          
        'price',
        'description',
        'store_name',    
    ];
    
    // Default: $table = 'products'

    /**
     * Accessor untuk mengatasi nama kolom yang berbeda.
     * Mengambil kolom 'nama' dari DB, tetapi dapat dipanggil sebagai $product->name di view.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            // Saat mengakses $product->name, ambil data dari kolom 'nama'
            get: fn (mixed $value, array $attributes) => $attributes['nama'],
        );
    }
}