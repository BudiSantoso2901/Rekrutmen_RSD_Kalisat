<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    //
    protected $table = 'kuis';
    protected $fillable = [
        'posisi_id',
        'nama_kuis',
        'waktu',
        'deskripsi',
        'dibuat_oleh',
    ];

    public function soal()
    {
        return $this->hasMany(Soal::class, 'id_kuis');
    }

    public function pengerjaan()
    {
        return $this->hasMany(PengerjaanPelamar::class, 'id_kuis');
    }
    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'posisi_id');
    }
}
