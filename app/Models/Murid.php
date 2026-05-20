<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $fillable = [

        'nama_murid',
        'nama_orangtua',
        'no_hp',
        'alamat',
        'mata_pelajaran'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
