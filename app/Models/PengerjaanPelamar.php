<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengerjaanPelamar extends Model
{
    //
    protected $table = 'pengerjaan_pelamar';
    protected $fillable = [
        'id_pelamar',
        'id_kuis',
        'status',
        'nilai',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar');
    }

    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'id_kuis');
    }

    public function jawaban()
    {
        return $this->hasMany(JawabanPelamar::class, 'pengerjaan_id');
    }
}
