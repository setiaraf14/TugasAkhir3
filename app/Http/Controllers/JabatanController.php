<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatan = Jabatan::all()->sortByDesc('id');
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jabatan.create');
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
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans', 
            'keterangan_jabatan' => 'required'
        ]);
        Jabatan::create($validatedData);

        return redirect()->route('jabatan.index')->with('Pesan', "Jabatan $request->nama_jabatan Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan,'.$jabatan->id,
            'keterangan_jabatan' => 'required'
        ]);

       $jabatan->update($validatedData);
        return redirect()->route('jabatan.index')->with('Pesan', "Jabatan $jabatan->nama_jabatan, berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('Pesan', "Divisi $jabatan->nama_jabatan, berhasil dihapus");
    }
}
