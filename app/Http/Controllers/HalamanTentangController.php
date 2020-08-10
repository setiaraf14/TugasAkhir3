<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tentang;

class HalamanTentangController extends Controller
{
    //
    public function index(){
        $tentang = Tentang::all();
        return view('tampilan.halamantentang.index', compact('tentang'));
    }
}
