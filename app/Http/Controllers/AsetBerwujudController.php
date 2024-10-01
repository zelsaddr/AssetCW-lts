<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\PenggunaAset;
use App\Models\Satuan;
use App\Models\LokasiAset;
use App\Models\Aset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AsetBerwujudController extends Controller
{
    public function index()
    {
        $barangs = Barang::doesntHave('aset')->with('kategori')->get();
        // print($barangs);
        $penggunas = PenggunaAset::all();
        $satuans = Satuan::all();
        $lokasis = LokasiAset::all();
        $asets = Aset::with('barang', 'lokasiAset', 'pengguna', 'satuan', 'dokumen')->get()->map(function ($aset) {
            $aset->dokumen_status = $aset->dokumen->isEmpty() ? 'N/A' : 'Ada';
            $aset->kategori = $aset->barang->kategori;
            $aset->nama_lokasi = $aset->lokasiAset->nama_lokasi;
            return $aset;
        });
        return view('dashboards.berwujud.index', compact('barangs', 'penggunas', 'satuans', 'lokasis', 'asets'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_aset' => 'required',
            'tanggal_barang_datang' => 'required',
            'foto_barang_path' => 'required|file|image|mimes:png,jpg,jpeg,webp',
            'volume_barang' => 'required',
            'nama_pengguna' => 'required',
            'satuan' => 'required',
            'kode_aset' => 'nullable',
            'kondisi' => 'required',
            'lokasi_aset' => 'required',
            'keterangan' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('aset-berwujud.index')->with('error', 'Data yang dimasukkan tidak valid');
        }

        $data = $request->all();
        // join data aset berwujud with barang and kategori table
        $get_kode_kategori_from_barang = Barang::join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('kategori.kode_kategori')
            ->where('barang.id', $request->nama_aset)->first();
        $get_all_kode_aset = Aset::join('barang', 'aset.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('aset.kode_aset', 'barang.nama_barang', 'kategori.nama_kategori', 'kategori.kode_kategori')
            ->where('kategori.kode_kategori', $get_kode_kategori_from_barang['kode_kategori'])->get();
        if ($request->kode_aset) {
            $data['kode_aset'] = $request->kode_aset;
        } else{ 
            $kode_aset_higher = 0;
            $prefix_awal = '';
            foreach ($get_all_kode_aset as $aset) {
                $kode_kategori = explode('-', explode('.', $aset['kode_aset'])[0])[1];
                if ($kode_kategori > $kode_aset_higher) {
                    $kode_aset_higher = $kode_kategori;
                    $prefix_awal = explode('-', explode('.', $aset['kode_aset'])[0])[0];
                }
            }
            if ($kode_aset_higher == 0) {
                $expl = explode('-', $get_kode_kategori_from_barang['kode_kategori']);
                $kode_aset_higher = $expl[1];
                $prefix_awal = $expl[0];
            }
            $kode_aset_higher += 1;
            $kode_aset_for_new_item = $prefix_awal . '-' . $kode_aset_higher . '.' . date('d.m.Y', strtotime($request->tanggal_barang_datang));
            $data['kode_aset'] = $kode_aset_for_new_item;
        }
        $data['barang_id'] = $request->nama_aset;
        $data['pengguna_id'] = $request->nama_pengguna;
        $data['satuan_id'] = $request->satuan;
        $data['lokasi_aset_id'] = $request->lokasi_aset;
        $data['nilai_perolehan'] = $request->nilai_perolehan;
        $data['volume'] = $request->volume_barang;
        // simpan foto barang
        $data['foto_barang_path'] = $request->file('foto_barang_path')->store('assets/aset-berwujud', 'public');
        Aset::create($data);
        return redirect()->route('aset-berwujud.index')->with('success', 'Aset berhasil ditambahkan');
    }

    public function getKodeAsetByBarang($id)
    {
        $findOrfail = Barang::findOrFail($id);
        if (!$findOrfail) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }
        $get_kode_kategori_from_barang = Barang::join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('kategori.kode_kategori')
            ->where('barang.id', $id)->first();
        $get_all_kode_aset = Aset::join('barang', 'aset.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('aset.kode_aset', 'barang.nama_barang', 'kategori.nama_kategori', 'kategori.kode_kategori')
            ->where('kategori.kode_kategori', $get_kode_kategori_from_barang['kode_kategori'])->get();
        $kode_aset_higher = 0;
        $prefix_awal = '';
        foreach ($get_all_kode_aset as $aset) {
            $kode_kategori = explode('-', explode('.', $aset['kode_aset'])[0])[1];
            if ($kode_kategori > $kode_aset_higher) {
                $kode_aset_higher = $kode_kategori;
                $prefix_awal = explode('-', explode('.', $aset['kode_aset'])[0])[0];
            }
        }
        if ($kode_aset_higher == 0) {
            $expl = explode('-', $get_kode_kategori_from_barang['kode_kategori']);
            $kode_aset_higher = $expl[1];
            $prefix_awal = $expl[0];
        }
        // Gunakan regex untuk mencari angka (3-4 digit) dalam $kode_kategori
        preg_match("/(\d{3,4})/i", $kode_aset_higher, $match);

        // Ambil angka yang ditemukan dan tambahkan 1
        $angka_baru = str_pad((int)$match[1] + 1, strlen($match[1]), '0', STR_PAD_LEFT);

        // Gantikan angka lama dengan angka baru
        $kode_aset_higher = str_replace($match[1], $angka_baru, $kode_aset_higher);

        $kode_aset_for_new_item = $prefix_awal . '-' . $kode_aset_higher . '.';
        return response()->json(['kode_aset' => $kode_aset_for_new_item]);
    }

    public function destroy($id)
    {
        $aset = Aset::findOrFail(['aset_id' => $id])->first();
        // print($aset);
        if ($aset->foto_barang_path) {
            Storage::delete($aset->foto_barang_path);
        }
        $aset->delete();
        return redirect()->route('aset-berwujud.index')->with('success', 'Aset berhasil dihapus');
    }

    
}
