<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index()
    {
        // Get total assets count
        $totalAssets = DB::table('aset')->count();
        
        // Get total categories count
        $totalCategories = DB::table('kategori')->count();
        
        // Get total items count
        $totalItems = DB::table('barang')->count();
        
        // Get assets by condition
        $assetsByCondition = DB::table('aset')
            ->select('kondisi', DB::raw('count(*) as total'))
            ->groupBy('kondisi')
            ->get();
            
        // Get top 5 categories with most assets
        $topCategories = DB::table('aset')
            ->join('barang', 'aset.barang_id', '=', 'barang.id')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select('kategori.nama_kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
            
        // Get total asset value
        $totalValue = DB::table('aset')->sum('nilai_perolehan');
        
        return view('public.dashboard', compact(
            'totalAssets',
            'totalCategories',
            'totalItems',
            'assetsByCondition',
            'topCategories',
            'totalValue'
        ));
    }
} 