<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanMengajar extends Model
{
    protected $fillable = [

        'jadwal_id',
        'guru_id',
        'murid_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'materi',
        'catatan',
        'status'

    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }
}
