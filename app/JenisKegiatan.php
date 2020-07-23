<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    //
    protected $guarded = [];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'jenis_kegiatan_id', 'id');
    }
}
