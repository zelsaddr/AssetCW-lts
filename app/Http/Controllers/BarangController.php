<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
class BarangController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $barangs = Barang::with('kategori')->get();
        return view('dashboards.barang.index', compact('barangs', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'tahun_perolehan' => 'required',
            'foto_tampak_depan' => 'required|file|image|mimes:jpeg,png,jpg',
            'foto_tampak_samping' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        // upload foto_tampak_depan and foto_tampak_samping (make filename randomized) to public path then create to database
        $foto_tampak_depan_path = $request->file('foto_tampak_depan')->store('public/foto_tampak_depan');
        $foto_tampak_samping_path = $request->file('foto_tampak_samping')->store('public/foto_tampak_samping');
        $barang = Barang::create([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'tahun_perolehan' => $request->tahun_perolehan,
            'foto_tampak_depan_path' => $foto_tampak_depan_path,
            'foto_tampak_samping_path' => $foto_tampak_samping_path,
        ]);
        if ($barang) {
            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
        } else {
            return redirect()->route('barang.index')->with('error', 'Barang gagal ditambahkan');
        }
    }
}
