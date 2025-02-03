<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';
    
    protected $fillable = [
        'nomor_invoice',
        'barang_id',
        'kode_aset',
        'identitas_barang',
        'volume',
        'tanggal_barang_datang',
        'foto_barang_path',
        'pengguna_id',
        'satuan_id',
        'kondisi',
        'lokasi_aset_id',
        'nilai_perolehan',
        'keterangan'
    ];

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Relasi dengan model PenggunaAset
    public function pengguna()
    {
        return $this->belongsTo(PenggunaAset::class, 'pengguna_id');
    }

    // Relasi dengan model Satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }

    // Relasi dengan model LokasiAset
    public function lokasiAset()
    {
        return $this->belongsTo(LokasiAset::class, 'lokasi_aset_id');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'aset_id');
    }

}
