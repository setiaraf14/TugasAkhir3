<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\Anggota;
use App\Divisi;
use App\JenisKegiatan;

class HalamanUtamaController extends Controller
{
    //
    public function index($id = Null){
        $kegiatan_carousel = Kegiatan::orderBy('created_at', 'Desc')->take(2)->get();
        $kegiatan_berita = Kegiatan::orderBy('created_at', 'desc')->paginate(4); 
        // paginate(6)->sortByDesc('id')
        $divisis = Divisi::all()->sortByDesc('id');
        $jeniskegiatan = JenisKegiatan::all(); 
        return view('tampilan.halamanutama.index', compact('kegiatan_carousel', 'kegiatan_berita', 'divisis', 'jeniskegiatan', 'id' ));
    }

    public function show($id){
        $kegiatan = Kegiatan::findOrFail($id);
        return view('tampilan.halamanutama.show', compact('kegiatan'));
    }

    public function jenis($id){
        $kegiatan_carousel = Kegiatan::orderBy('created_at', 'Desc')->take(4)->get();
        $kegiatan_berita = Kegiatan::where('jenis_kegiatan_id', $id)->orderBy('created_at', 'Desc')->paginate(2); //untuk mengambil maksimal dua data dari berita yang sesuai dengan jenis pilihan user
        $jeniskegiatan = JenisKegiatan::all();
        return view('tampilan.halamanutama.index', compact('kegiatan_berita', 'kegiatan_carousel', 'jeniskegiatan', 'id' ));
    }

    
}

