<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'aset_id',
        'dokumen_uploaded_path',
    ];

    // Relasi dengan model Aset
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }
}
