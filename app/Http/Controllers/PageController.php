<?php

namespace App\Http\Controllers;

use App\Surat;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function suratMasuk()
    {
        $data = Surat::all();
        return view('surat.index', compact('data'));
    }
}
