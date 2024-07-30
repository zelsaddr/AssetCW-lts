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
        'foto_tampak_depan_path',
        'foto_tampak_samping_path',
    ];

    // Define relationships
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
