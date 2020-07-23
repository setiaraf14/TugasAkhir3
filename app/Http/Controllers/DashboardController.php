<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Kegiatan;
use App\Divisi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard', [
            'anggota' => Anggota::count(),
            'kegiatan' => Kegiatan::count(),
            'divisi' => Divisi::count()
        ]);
    }
}
