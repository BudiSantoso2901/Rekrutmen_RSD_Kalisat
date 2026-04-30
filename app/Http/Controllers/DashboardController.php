<?php
// ═══════════════════════════════════════════════════════════════════════════════
//  DashboardController.php
//  Statistik ringkasan untuk dashboard IT dan SDM
// ═══════════════════════════════════════════════════════════════════════════════

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Pelamar;
use App\Models\PengerjaanPelamar;
use App\Models\Posisi;
use App\Models\Soal;

class DashboardController extends Controller
{
    // Dashboard SDM
    public function sdm()
    {
        return view('sdm.dashboard', [
            'totalPelamar'      => Pelamar::count(),
            'pelamarMenunggu'   => Pelamar::where('status_pelamar', 'menunggu')->count(),
            'pelamarDiterima'   => Pelamar::where('status_pelamar', 'diterima')->count(),
            'pelamarDitolak'    => Pelamar::where('status_pelamar', 'ditolak')->count(),
            'totalPosisi'       => Posisi::count(),
            'posisiAktif'       => Posisi::where('tanggal_ditutup', '>=', now()->toDateString())->count(),
            'totalKuis'         => Kuis::count(),
            'totalPengerjaan'   => PengerjaanPelamar::where('status', 'selesai')->count(),
            'pelamarPerPosisi'  => Posisi::withCount('pelamar')->get(),
            'recentPelamar'     => Pelamar::with('posisi')->latest()->take(5)->get(),
        ]);
    }

    // Dashboard IT
    public function it()
    {
        return view('it.dashboard', [
            'totalPelamar'    => Pelamar::count(),
            'totalPosisi'     => Posisi::count(),
            'totalKuis'       => Kuis::count(),
            'totalSoal'       => Soal::count(),
            'rataRataNilai'   => PengerjaanPelamar::where('status','selesai')
                ->whereNotNull('nilai')->avg('nilai'),
            'recentPengerjaan'=> PengerjaanPelamar::with(['pelamar','kuis'])
                ->where('status','selesai')->latest()->take(5)->get(),
        ]);
    }
}

// ═══════════════════════════════════════════════════════════════════════════════
//  RINGKASAN SEMUA ENDPOINT & FUNGSI
// ═══════════════════════════════════════════════════════════════════════════════
/*
╔══════════════════════════════════════════════════════════════════════════════╗
║  CONTROLLER          FUNCTION              METHOD   ROUTE                   ║
╠══════════════════════════════════════════════════════════════════════════════╣
║ AuthController                                                               ║
║                      showLogin()           GET      /auth/login             ║
║                      login()              POST     /auth/login             ║
║                      showRegister()        GET      /auth/register (IT)     ║
║                      register()           POST     /auth/register (IT)     ║
║                      logout()             POST     /auth/logout            ║
╠══════════════════════════════════════════════════════════════════════════════╣
║ PelamarController                                                            ║
║  (Publik)            showDaftar()          GET      /daftar                 ║
║                      daftar()             POST     /daftar                 ║
║                      sukses()             GET      /daftar/sukses/{id}     ║
║                      showLogin()          GET      /pelamar/login          ║
║                      login()              POST     /pelamar/login          ║
║                      logout()             POST     /pelamar/logout         ║
║  (Pelamar Login)     dashboard()          GET      /pelamar/dashboard      ║
║  (SDM/IT)            index()              GET      /sdm/pelamar            ║
║                      show()               GET      /sdm/pelamar/{id}       ║
║                      updateStatus()       PATCH    /sdm/pelamar/{id}/status║
╠══════════════════════════════════════════════════════════════════════════════╣
║ PosisiController                                                             ║
║  (SDM/IT)            index()              GET      /sdm/posisi             ║
║                      create()             GET      /sdm/posisi/tambah      ║
║                      store()              POST     /sdm/posisi             ║
║                      edit()               GET      /sdm/posisi/{id}/edit   ║
║                      update()             PUT      /sdm/posisi/{id}        ║
║                      destroy()            DELETE   /sdm/posisi/{id}        ║
╠══════════════════════════════════════════════════════════════════════════════╣
║ KuisController                                                               ║
║  (SDM/IT)            index()              GET      /sdm/kuis               ║
║                      create()             GET      /sdm/kuis/tambah        ║
║                      store()              POST     /sdm/kuis               ║
║                      show()               GET      /sdm/kuis/{id}          ║
║                      edit()               GET      /sdm/kuis/{id}/edit     ║
║                      update()             PUT      /sdm/kuis/{id}          ║
║                      destroy()            DELETE   /sdm/kuis/{id}          ║
║                      soalIndex()          GET      /sdm/kuis/{id}/soal     ║
║                      soalCreate()         GET      /sdm/kuis/{id}/soal/tambah║
║                      soalStore()          POST     /sdm/kuis/{id}/soal     ║
║                      soalEdit()           GET      /sdm/kuis/{id}/soal/{sid}/edit║
║                      soalUpdate()         PUT      /sdm/kuis/{id}/soal/{sid}║
║                      soalDestroy()        DELETE   /sdm/kuis/{id}/soal/{sid}║
╠══════════════════════════════════════════════════════════════════════════════╣
║ PengerjaanController                                                         ║
║  (Pelamar Diterima)  index()              GET      /pelamar/kuis           ║
║                      instruksi()          GET      /pelamar/kuis/{id}/instruksi║
║                      mulai()              POST     /pelamar/kuis/{id}/mulai║
║                      kerjakan()           GET      /pelamar/kuis/kerjakan/{id}║
║                      simpanJawaban()      POST     /pelamar/kuis/simpan/{id}(AJAX)║
║                      submit()             POST     /pelamar/kuis/submit/{id}║
║                      hasil()              GET      /pelamar/kuis/hasil/{id}║
║  (SDM/IT)            sdmIndex()           GET      /sdm/pengerjaan         ║
║                      sdmDetail()          GET      /sdm/pengerjaan/{id}    ║
╚══════════════════════════════════════════════════════════════════════════════╝
*/

// ═══════════════════════════════════════════════════════════════════════════════
//  CATATAN PENTING — Perbaikan Model Kuis
//  Model Kuis.php memiliki method kuis() yang menunjuk ke dirinya sendiri.
//  Ganti dengan relasi soal() agar withCount('soal') bisa bekerja:
// ═══════════════════════════════════════════════════════════════════════════════
/*
// app/Models/Kuis.php — tambah/ganti method ini:

public function soal()
{
    return $this->hasMany(Soal::class, 'id_kuis');
}

public function pengerjaan()
{
    return $this->hasMany(PengerjaanPelamar::class, 'id_kuis');
}

// Hapus method kuis() yang menunjuk ke diri sendiri karena akan menyebabkan
// infinite loop. Jika perlu relasi pembuat → kuis, tambahkan di model User:

// app/Models/User.php
public function kuisDibuat()
{
    return $this->hasMany(Kuis::class, 'dibuat_oleh');
}
*/

// ═══════════════════════════════════════════════════════════════════════════════
//  TAMBAHAN KOLOM MIGRATION YANG DIBUTUHKAN
// ═══════════════════════════════════════════════════════════════════════════════
/*
// Pelamar — tambah kolom waktu_mulai_kuis untuk tracking waktu
$table->timestamp('waktu_mulai_kuis')->nullable();

// PengerjaanPelamar — tambah kolom waktu untuk tracking durasi
$table->timestamp('started_at')->nullable();
$table->timestamp('finished_at')->nullable();

// Contoh migration untuk session waktu (alternatif dari session PHP):
// Bisa juga menyimpan started_at di tabel pengerjaan_pelamar
// agar tidak hilang jika browser ditutup.

// Rekomendasi update PengerjaanPelamar migration:
Schema::create('pengerjaan_pelamar', function (Blueprint $table) {
    $table->id();
    $table->foreignId('id_pelamar')->constrained('pelamars')->cascadeOnDelete();
    $table->foreignId('id_kuis')->constrained('kuis')->cascadeOnDelete();
    $table->enum('status', ['berlangsung', 'selesai'])->default('berlangsung');
    $table->decimal('nilai', 5, 2)->nullable();
    $table->timestamp('started_at')->nullable();   // ← tambah
    $table->timestamp('finished_at')->nullable();  // ← tambah
    $table->timestamps();
    $table->unique(['id_pelamar', 'id_kuis']);     // satu pelamar = satu pengerjaan per kuis
});
*/

// ═══════════════════════════════════════════════════════════════════════════════
//  INSTALASI PACKAGE REKOMENDASI
// ═══════════════════════════════════════════════════════════════════════════════
/*
# Spatie Laravel Permission (alternatif middleware manual):
composer require spatie/laravel-permission

# Laravel Sanctum (jika butuh API):
composer require laravel/sanctum

# Intervention Image (resize foto soal):
composer require intervention/image

# Untuk export hasil kuis ke Excel:
composer require maatwebsite/excel
*/
