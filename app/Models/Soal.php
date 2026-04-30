<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    //
    protected $table = 'soals';
    protected $fillable = [
        'id_kuis',
        'pertanyaan',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_benar',
        'foto_soal',
    ];
    public function kuis()
    {
        return $this->belongsTo(Kuis::class, 'id_kuis');
    }
}
