<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    //
    protected $table = 'pelamars';
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'password',
        'id_posisi',
        'status_pelamar',
        'file_upload',
        'kota_domisili',
        'pengalaman_kerja',
        'keterangan_pengalaman',
        'nomer_peserta',
    ];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi');
    }

    public function pengerjaan()
    {
        return $this->hasMany(PengerjaanPelamar::class, 'id_pelamar');
    }
}
