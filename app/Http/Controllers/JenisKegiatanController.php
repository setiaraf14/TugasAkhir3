<?php

namespace App\Http\Controllers;

use App\JenisKegiatan;
use Illuminate\Http\Request;

class JenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisKegiatan = JenisKegiatan::all()->sortByDesc('id');
        return view("JenisKegiatan.index", compact("jenisKegiatan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("JenisKegiatan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasiData = $request->validate([
            'nama_jenis_kegiatan' => 'required|unique:jenis_kegiatans',
            'keterangan_jenis_kegiatan' => 'required'
        ]);

        JenisKegiatan::create($validasiData);
        return redirect()->route('jeniskegiatan.index')->with('Pesan', "Jenis Kegiatan $request->nama_jenis_kegiatan Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKegiatan $jenisKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKegiatan $jeniskegiatan)
    {
        //
        return view("JenisKegiatan.edit", compact("jeniskegiatan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKegiatan $jeniskegiatan)
    {
        //
        $validatedData = $request->validate([
    
            'nama_jenis_kegiatan' => 'required|unique:jenis_kegiatans,nama_jenis_kegiatan,'.$jeniskegiatan->id,
            'keterangan_jenis_kegiatan' => 'required'
        ]);

        $jeniskegiatan->update($validatedData);
        return redirect()->route('jeniskegiatan.index')->with('Pesan', "Jabatan $jeniskegiatan->nama_jenis_kegiatan, berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisKegiatan  $jenisKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKegiatan $jeniskegiatan)
    {
        $jeniskegiatan->delete();
        return redirect()->route('jeniskegiatan.index')->with('Pesan', "Divisi $jeniskegiatan->nama_jenis_kegiatan, berhasil dihapus");
    }
}
