<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaAset;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        $penggunas = PenggunaAset::all();
        return view('dashboards.pengguna.index', compact('penggunas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pengguna' => 'required',
            'jabatan' => 'required',
            'posisi_pengguna' => 'required'
        ]);
        $create = PenggunaAset::create($data);
        if (!$create) {
            return redirect()->route('pengguna.index')->with('error', 'Pengguna gagal ditambahkan');
        }
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }
    
    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'nama_pengguna' => 'required',
            'jabatan' => 'required',
            'posisi_pengguna' => 'required'
        ]);
        $pengguna = PenggunaAset::findOrFail($request->id);
        $update = $pengguna->update($data);
        if (!$update) {
            return redirect()->route('pengguna.index')->with('error', 'Pengguna gagal diubah');
        }
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diubah');
    }

    public function destroy($id)
    {
        $pengguna = PenggunaAset::findOrFail($id);
        $delete = $pengguna->delete();
        if (!$delete) {
            return redirect()->route('pengguna.index')->with('error', 'Pengguna gagal dihapus');
        }
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
