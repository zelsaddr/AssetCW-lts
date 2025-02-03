<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aset;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DokumenController extends Controller
{
    public function index()
    {
        $semua_aset = Aset::doesntHave('dokumen')->with('barang')->get();
        // join dokumen, data aset berwujud, and barang table
        $semua_dokumen = Dokumen::join('aset', 'dokumen.aset_id', '=', 'aset.id')
            ->join('barang', 'aset.barang_id', '=', 'barang.id')
            ->select('dokumen.*', 'barang.nama_barang', 'barang.tahun_perolehan', 'aset.kode_aset', 'aset.foto_barang_path')
            ->get()
            ->groupBy('dokumen_uploaded_path');
        // print($semua_dokumen);
        // print($semua_aset);
        return view('dashboards.dokumenpengadaan.index', compact('semua_aset', 'semua_dokumen'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aset_id' => 'array|required',
            'aset_id.*' => 'exists:aset,id',
            'dokumen_upload' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx'
        ]);
        if ($validator->fails()) {
            return redirect()->route('dokumen-pengadaan.index')->with('error', $validator->errors()->first());
        }
        $stored_path = $request->file('dokumen_upload')->store('dokumen_pengadaan', 'public');
        foreach ($request->aset_id as $aset_id) {
            $dokumen = new Dokumen();
            $dokumen->aset_id = $aset_id;
            // upload dokumen to storage
            $dokumen->dokumen_uploaded_path = $stored_path;
            $dokumen->save();
        }
        // $data = $request->all();
        // $dokumen = new Dokumen();
        // $dokumen->aset_id = $data['aset_id'];
        // // upload dokumen to storage
        // $dokumen->dokumen_uploaded_path = $request->file('dokumen_upload')->store('dokumen_pengadaan', 'public');
        // $dokumen->save();

        return redirect()->route('dokumen-pengadaan.index')->with('success', 'Dokumen berhasil diunggah');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aset_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('dokumen-pengadaan.index')->with('error', $validator->errors()->first());
        }
        if ($request->hasFile('dokumen_upload')) {
            $validator = Validator::make($request->all(), [
                'dokumen_upload' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx'
            ]);
            if ($validator->fails()) {
                return redirect()->route('dokumen-pengadaan.index')->with('error', $validator->errors()->first());
            }
        }
        $data = $request->all();
        $dokumen = Dokumen::find($data['id']);
        $dokumen->aset_id = $data['aset_id'];
        if ($request->hasFile('dokumen_upload')) {
            // delete old file
            Storage::delete($dokumen->dokumen_uploaded_path);
            // upload new file
            $dokumen->dokumen_uploaded_path = $data['dokumen_upload']->store('dokumen_pengadaan');
        }
        $dokumen->save();

        return redirect()->route('dokumen-pengadaan.index')->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);
        // delete from storage
        Storage::delete($dokumen->dokumen_uploaded_path);
        $dokumen->delete();
        return redirect()->route('dokumen-pengadaan.index')->with('success', 'Dokumen berhasil dihapus');
    }

    public function reportPdf()
    {
        $semua_dokumen = Dokumen::join('aset', 'dokumen.aset_id', '=', 'aset.id')
            ->join('barang', 'aset.barang_id', '=', 'barang.id')
            ->select('dokumen.*', 'barang.nama_barang', 'barang.tahun_perolehan', 'aset.kode_aset', 'aset.foto_barang_path')
            ->get()
            ->groupBy('dokumen_uploaded_path');
        $pdf = PDF::loadView('dashboards.dokumenpengadaan.report', compact('semua_dokumen'));
        return $pdf->download('dokumen_pengadaan.pdf');
    }
}
