<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class HalamanDivisiController extends Controller
{
    //
    public function show($id){
        $divisi_halaman = Divisi::findOrFail($id);
        return view('tampilan.halamanutama.showdivisi', compact('divisi_halaman'));
    }
}
