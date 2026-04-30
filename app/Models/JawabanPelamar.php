<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanPelamar extends Model
{
    //
    protected $table = 'jawaban_pelamars';
    protected $fillable = [
        'pengerjaan_id',
        'soal_id',
        'jawaban',
        'benar',
    ];

    public function pengerjaan() {
        return $this->belongsTo(PengerjaanPelamar::class, 'pengerjaan_id');
    }

    public function soal() {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
