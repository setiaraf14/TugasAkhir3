<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Anggota;
use App\JenisKegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kegiatan = Kegiatan::all()->sortByDesc('id'); 
        return view('kegiatan.index', compact('kegiatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anggota = Anggota::all();
        $jenis_kegiatan = JenisKegiatan::all();
        return view('kegiatan.create', compact('anggota', 'jenis_kegiatan'));
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
            'nama_kegiatan' => 'required|min:10',
            'anggota_id' => 'required',
            'jenis_kegiatan_id' => 'required',
            'summary_kegiatan' => 'required',
            'foto_kegiatan' => 'image|max:3000',
            'tanggal_kegiatan' => 'required',
            'alamat_kegiatan' => 'required|max:100'
        ]);

        $validasiData['foto_kegiatan'] = $request->file('foto_kegiatan')->store('asset/kegiatan','public');
        Kegiatan::create($validasiData);
        return redirect()->route('kegiatan.index')->with('Pesan', "Data $request->nama_kegiatan berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
        $anggota = Anggota::all();
        $jenis_kegiatan = JenisKegiatan::all();
        return view('kegiatan.edit', compact('kegiatan', 'anggota', 'jenis_kegiatan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
        $validasiData = $request->validate([
            'nama_kegiatan' => 'required|min:10',
            'anggota_id' => 'required',
            'jenis_kegiatan_id' => 'required',
            'summary_kegiatan' => 'required',
            'foto_kegiatan' => 'image|max:3000',
            'tanggal_kegiatan' => 'required',
            'alamat_kegiatan' => 'required|max:100'
        ]);

        $dataId = $kegiatan->find($kegiatan->id);
        $data = $request->all();
        if($request->foto_kegiatan){
            Storage::delete('public/'.$dataId->foto_kegiatan);
            $data['foto_kegiatan'] = $request->file('foto_kegiatan')->store('asset/kegiatan','public');
        }
        $dataId->update($data);
        return redirect()->route('kegiatan.index')->with('Pesan',"update data $kegiatan->nama_kegiatan Berhasil ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
        Storage::delete('public/'.$kegiatan->foto_kegiatan);
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('Pesan', "$kegiatan->nama_kegiatan berhasil dihapus");
    }
}
