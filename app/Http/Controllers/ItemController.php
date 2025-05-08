<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        // Get all items with their categories
        $items = DB::table('barang')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('barang.*', 'kategori.nama_kategori')
            ->get();

        // Get all assets with their items and categories
        $assets = DB::table('aset')
            ->join('barang', 'aset.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('aset.*', 'barang.nama_barang', 'kategori.nama_kategori')
            ->get();

        // Get all categories
        $categories = DB::table('kategori')->get();

        return view('public.items', compact('items', 'assets', 'categories'));
    }
} 