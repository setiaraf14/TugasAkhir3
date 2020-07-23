<?php

namespace App\Http\Controllers;

use App\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divisi = Divisi::all()->sortByDesc('id');
        return view('divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('divisi.create');
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
            'nama_divisi' => 'required|unique:divisis',
            'tufoksi_divisi' => 'required'
        ]);
        Divisi::create($validatedData);

        return redirect()->route('divisi.index')->with('Pesan', "Bagian $request->nama_divisi Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $divisi)
    {
        //
        return view('divisi.edit',  compact('divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $divisi)
    {
        //
        $validatedData = $request->validate([
            'nama_divisi' => 'required|unique:divisis,nama_divisi,'.$divisi->id,
            'tufoksi_divisi' => 'required'
        ]);

        $divisi->update($validatedData);
        return redirect()->route('divisi.index')->with('Pesan', "Divisi $divisi->nama_divisi, berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        //
        $divisi->delete();
        return redirect()->route('divisi.index')->with('Pesan', "Divisi $divisi->nama_divisi, berhasil dihapus");
    }
}
