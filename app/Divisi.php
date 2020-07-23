<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    //
    protected $guarded = [];
    
    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'divisi_id', 'id');
    }
}
