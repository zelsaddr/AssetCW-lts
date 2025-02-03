<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('dashboards.kategori.index', compact('kategoris'));
    }
    public function store()
    {
        $data = request()->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);
        Kategori::create($data);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);
        // find or fail and return
        $kategori = Kategori::findOrFail($request->id);
        $kategori->update($data);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function getKodeKategori(Request $request)
    {
        // get by query
        $query = $request->query('q');
        $kategori = Kategori::where('kode_kategori', 'like', "%$query%")->get();
        return response()->json($kategori);
    }
}
