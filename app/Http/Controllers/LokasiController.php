<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiAset;

class LokasiController extends Controller
{
    //
    public function index()
    {
        $lokasis = LokasiAset::all();
        return view('dashboards.lokasi.index', compact('lokasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
        ]);
        $lokasi = LokasiAset::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);
        if ($lokasi) {
            return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan');
        } else {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi gagal ditambahkan');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_lokasi' => 'required',
        ]);
        $lokasi = LokasiAset::findOrFail($request->id);
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();
        if ($lokasi) {
            return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diubah');
        } else {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi gagal diubah');
        }
    }

    public function destroy($id)
    {
        $lokasi = LokasiAset::findOrFail($id);
        $lokasi->delete();
        if ($lokasi) {
            return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus');
        } else {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi gagal dihapus');
        }
    }

    public function getKodeLokasi(Request $request)
    {
        $lokasis = $request->input('lokasi');
        $lokasi = LokasiAset::where(
            'nama_lokasi', 'like', '%' . $lokasis . '%'
        )->first();
        return response()->json($lokasi);
    }
}
