<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        return view('dashboards.dokumenpengadaan.index');
    }
}
