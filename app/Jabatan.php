<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $guarded = [];

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'jabatan_id', 'id');
    }
}
