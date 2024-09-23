<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    // fillable
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'merk_barang',
        'tahun_perolehan',
    ];

    // Define relationships
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function aset()
    {
        return $this->hasMany(Aset::class, 'barang_id');
    }
}
