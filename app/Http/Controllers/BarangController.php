<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
class BarangController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        // $barangs = Barang::with('kategori')->get();
        $barangs = Barang::with('aset', 'kategori')
        ->get()
        ->map(function ($barang) {
            $barang->status = $barang->aset->isEmpty() ? 'tidak_tercatat' : 'tercatat';
            return $barang;
        });
        return view('dashboards.barang.index', compact('barangs', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'tahun_perolehan' => 'required',
        ]);
        $barang = Barang::create([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'tahun_perolehan' => $request->tahun_perolehan,
        ]);
        if ($barang) {
            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
        } else {
            return redirect()->route('barang.index')->with('error', 'Barang gagal ditambahkan');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'kategori_id_2' => 'required',
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'tahun_perolehan' => 'required',
        ]);
        $barang = Barang::find($request->id);
        $barang->kategori_id = $request->kategori_id_2;
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_barang = $request->merk_barang;
        $barang->tahun_perolehan = $request->tahun_perolehan;
        $save = $barang->save();
        if (!$save) {
            return redirect()->route('barang.index')->with('error', 'Barang gagal diubah');
        }
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diubah');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $delete = $barang->delete();
        if (!$delete) {
            return redirect()->route('barang.index')->with('error', 'Barang gagal dihapus');
        }
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
