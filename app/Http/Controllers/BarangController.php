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
        if ($request->hasFile('foto_tampak_depan')) {
            $request->validate([
                'foto_tampak_depan' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
            // delete old foto_tampak_depan
            if ($barang->foto_tampak_depan_path) {
                Storage::delete($barang->foto_tampak_depan_path);
            }
            // upload foto_tampak_depan (make filename randomized) to public path then update to database
            $foto_tampak_depan_path = $request->file('foto_tampak_depan')->store('public/foto_tampak_depan');
            $barang->foto_tampak_depan_path = $foto_tampak_depan_path;
        }
        if ($request->hasFile('foto_tampak_samping')) {
            $request->validate([
                'foto_tampak_samping' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
             // delete old foto_tampak_samping
            if ($barang->foto_tampak_depan_path) {
                Storage::delete($barang->foto_tampak_samping_path);
            }
            // upload foto_tampak_samping (make filename randomized) to public path then update to database
            $foto_tampak_samping_path = $request->file('foto_tampak_samping')->store('public/foto_tampak_samping');
            $barang->foto_tampak_samping_path = $foto_tampak_samping_path;
        }
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
        if ($barang->foto_tampak_depan_path) {
            Storage::delete($barang->foto_tampak_depan_path);
        }
        if ($barang->foto_tampak_samping_path) {
            Storage::delete($barang->foto_tampak_samping_path);
        }
        $delete = $barang->delete();
        if (!$delete) {
            return redirect()->route('barang.index')->with('error', 'Barang gagal dihapus');
        }
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
