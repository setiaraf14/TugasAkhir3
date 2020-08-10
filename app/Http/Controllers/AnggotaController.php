<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Divisi;
use App\Jabatan;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggota = Anggota::all()->sortByDesc('id');
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('anggota.create', compact('divisi','jabatan'));
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
            'nama_anggota' => 'required|min:3',
            'hp_anggota' => 'required|min:11|numeric',
            'ktp_anggota' => 'required|min:12|numeric',
            'alamat_anggota' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'profile_anggota' => 'required',
            'foto_anggota' => 'required|image|max:3000',
            'tanggal_masuk' => 'required'

        ]);

        $validasiData['foto_anggota'] = $request->file('foto_anggota')->store('asset/anggota','public');
        Anggota::create($validasiData);
        return redirect()->route('anggotas.index')->with('Pesan', "Data $request->nama_anggota berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        return view('anggota.edit', compact('anggota','divisi','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
        $validasiData = $request->validate([
            'nama_anggota' => 'required|min:3',
            'hp_anggota' => 'required|numeric',
            'ktp_anggota' => 'required|numeric',
            'alamat_anggota' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
            'profile_anggota' => 'required',
            'foto_anggota' => 'image|max:3000',
            'tanggal_masuk' => 'required'

        ]);

        $dataId = $anggota->find($anggota->id);
        $data = $request->all();
        if($request->foto_anggota){
            Storage::delete('public/'.$dataId->foto_anggota);
            $data['foto_anggota'] = $request->file('foto_anggota')->store('asset/anggota','public');
        }
        $dataId->update($data);
        return redirect()->route('anggotas.index')->with('Pesan',"update data $anggota->nama_anggota Berhasil ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
