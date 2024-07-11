<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    public function index()
    {
        return view('dashboards.subkategori.index');
    }
}
