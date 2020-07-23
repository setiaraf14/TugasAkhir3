<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $guarded = [];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

    public function jeniskegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class, 'jenis_kegiatan_id', 'id'); 
    }

}
