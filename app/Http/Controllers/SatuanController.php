<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;

class SatuanController extends Controller
{
    //
    public function index()
    {
        $satuan = Satuan::all();
        return view('dashboards.satuan.index', compact('satuan'));
    }

    public function store()
    {
        $data = request()->validate([
            'nama_satuan' => 'required'
        ]);
        Satuan::create($data);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'nama_satuan' => 'required'
        ]);
        // find or fail and return
        $satuan = Satuan::findOrFail($request->id);
        $satuan->update($data);
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diubah');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus');
    }
}
