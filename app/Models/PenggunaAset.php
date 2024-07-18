<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaAset extends Model
{
    use HasFactory;
    protected $table = 'pengguna_aset';
    // fillable
    protected $fillable = [
        'nama_pengguna',
        'jabatan',
        'posisi_pengguna'
    ];
}
