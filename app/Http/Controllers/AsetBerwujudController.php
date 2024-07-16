<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsetBerwujudController extends Controller
{
    public function index()
    {
        return view('dashboards.berwujud.index');
    }
}
