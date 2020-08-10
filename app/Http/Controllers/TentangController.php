<?php

namespace App\Http\Controllers;

use App\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tentang = Tentang::all()->sortByDesc('id'); 
        return view('tentang.index', compact('tentang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function show(Tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function edit(Tentang $tentang)
    {
        //
        return view('tentang.edit',compact('tentang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tentang $tentang)
    {
        //
        $validateData=$request->validate([
            'nama_instansi'=>'required',
            'moto_instansi'=>'required',
            'desk_instansi'=>'required',
            'visi_instansi'=>'required',
            'misi_instansi'=>'required',
            'logo_instansi'=>'file|image|max:2048',
            'alamat_instansi'=>'required'
        ]);
        $dataId=$tentang->findOrFail($tentang->id);
        $data=$request->all();
        if($request->logo_instansi){
            Storage::delete('public/'.$dataId->logo_instansi);
            $data['logo_instansi']=$request->file('logo_instansi')->store('asset/profile','public');
        }
        $dataId->update($data);
        return redirect()->route('tentang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}
