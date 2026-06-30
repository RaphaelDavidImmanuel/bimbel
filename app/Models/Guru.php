<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable =[
        'user_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'mata_pelajaran'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laporanMengajars()
    {
        return $this->hasMany(LaporanMengajar::class);
    }


    // use HasFactory;
}
