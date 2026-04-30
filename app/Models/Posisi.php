<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    //
    protected $table = 'posisis';
    protected $fillable = [
        'nama_posisi',
        'deskripsi_posisi',
        'tanggal_ditutup',
    ];
    public function pelamar()
    {
        return $this->hasMany(Pelamar::class, 'id_posisi');
    }
    public function kuis()
    {
        return $this->hasMany(Kuis::class, 'posisi_id');
    }
}
