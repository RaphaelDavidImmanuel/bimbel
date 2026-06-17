<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [

        'guru_id',
        'murid_id',
        'mata_pelajaran',
        'hari',
        'jam',
        'alamat',
        'status_notif'

    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
