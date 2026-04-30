<?php

namespace App\Http\Controllers;

use App\Models\JawabanPelamar;
use App\Models\Kuis;
use App\Models\Pelamar;
use App\Models\PengerjaanPelamar;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengerjaanController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // MIDDLEWARE CHECK — Pastikan pelamar login & status diterima
    // Dipanggil dari __construct atau route middleware
    // ─────────────────────────────────────────────────────────────
    private function getPelamar(): Pelamar
    {
        $id = session('pelamar_id');
        abort_if(! $id, 403, 'Silakan login terlebih dahulu.');

        $pelamar = Pelamar::findOrFail($id);
        abort_if(
            $pelamar->status_pelamar !== 'diterima',
            403,
            'Hanya pelamar berstatus "diterima" yang dapat mengerjakan kuis.'
        );

        return $pelamar;
    }

    // ─────────────────────────────────────────────────────────────
    // DAFTAR KUIS TERSEDIA UNTUK PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function index()
    {
        $pelamar = $this->getPelamar();

        // Ambil kuis sesuai posisi pelamar
        $kuiss = Kuis::where('posisi_id', $pelamar->id_posisi)
            ->withCount('soal')
            ->get()
            ->map(function ($kuis) use ($pelamar) {
                // Cek apakah pelamar sudah mengerjakan kuis ini
                $kuis->pengerjaan = PengerjaanPelamar::where('id_pelamar', $pelamar->id)
                    ->where('id_kuis', $kuis->id)
                    ->first();
                return $kuis;
            });

        return view('pelamar.kuis.index', compact('pelamar', 'kuiss'));
    }

    // ─────────────────────────────────────────────────────────────
    // HALAMAN INSTRUKSI SEBELUM MENGERJAKAN KUIS
    // ─────────────────────────────────────────────────────────────
    public function instruksi($kuisId)
    {
        $pelamar = $this->getPelamar();
        $kuis    = Kuis::with(['posisi'])->withCount('soal')->findOrFail($kuisId);

        // Pastikan kuis sesuai posisi pelamar
        abort_if(
            $kuis->posisi_id !== $pelamar->id_posisi,
            403,
            'Kuis ini tidak tersedia untuk posisi Anda.'
        );

        // Cek apakah sudah pernah mengerjakan dan sudah selesai
        $pengerjaan = PengerjaanPelamar::where('id_pelamar', $pelamar->id)
            ->where('id_kuis', $kuisId)
            ->first();

        if ($pengerjaan && $pengerjaan->status === 'selesai') {
            return redirect()->route('pelamar.kuis.hasil', $pengerjaan->id)
                ->with('info', 'Anda sudah menyelesaikan kuis ini.');
        }

        return view('pelamar.kuis.instruksi', compact('pelamar', 'kuis', 'pengerjaan'));
    }

    // ─────────────────────────────────────────────────────────────
    // MULAI KUIS — Buat record pengerjaan
    // ─────────────────────────────────────────────────────────────
    public function mulai(Request $request, $kuisId)
    {
        $pelamar = $this->getPelamar();
        $kuis    = Kuis::withCount('soal')->findOrFail($kuisId);

        abort_if($kuis->posisi_id !== $pelamar->id_posisi, 403);
        abort_if($kuis->soal_count === 0, 422, 'Kuis belum memiliki soal.');

        // Cek sudah ada pengerjaan
        $pengerjaan = PengerjaanPelamar::where('id_pelamar', $pelamar->id)
            ->where('id_kuis', $kuisId)
            ->first();

        if ($pengerjaan) {
            // Jika status masih berlangsung, lanjutkan
            if ($pengerjaan->status === 'berlangsung') {
                return redirect()->route('pelamar.kuis.kerjakan', $pengerjaan->id);
            }
            // Sudah selesai
            return redirect()->route('pelamar.kuis.hasil', $pengerjaan->id);
        }

        // Buat pengerjaan baru
        $pengerjaan = PengerjaanPelamar::create([
            'id_pelamar' => $pelamar->id,
            'id_kuis'    => $kuisId,
            'status'     => 'berlangsung',
            'nilai'      => null,
        ]);

        // Simpan waktu mulai di session
        session(["kuis_mulai_{$pengerjaan->id}" => now()->timestamp]);

        return redirect()->route('pelamar.kuis.kerjakan', $pengerjaan->id);
    }

    // ─────────────────────────────────────────────────────────────
    // HALAMAN PENGERJAAN KUIS
    // ─────────────────────────────────────────────────────────────
    public function kerjakan($pengerjaanId)
    {
        $pelamar    = $this->getPelamar();
        $pengerjaan = PengerjaanPelamar::with(['kuis.soal'])->findOrFail($pengerjaanId);

        // Pastikan pengerjaan milik pelamar ini
        abort_if($pengerjaan->id_pelamar !== $pelamar->id, 403);
        abort_if($pengerjaan->status === 'selesai', 302,
            redirect()->route('pelamar.kuis.hasil', $pengerjaanId));

        $kuis  = $pengerjaan->kuis;
        $soals = $kuis->soal()->orderBy('id')->get();

        // Hitung sisa waktu
        $mulaiTimestamp = session("kuis_mulai_{$pengerjaanId}", now()->timestamp);
        $sisaDetik      = ($kuis->waktu * 60) - (now()->timestamp - $mulaiTimestamp);
        $sisaDetik      = max(0, $sisaDetik);

        // Jika waktu habis, auto submit
        if ($sisaDetik <= 0) {
            return $this->prosesSubmit($pengerjaan, [], true);
        }

        // Jawaban yang sudah diisi
        $jawabanTersimpan = JawabanPelamar::where('pengerjaan_id', $pengerjaanId)
            ->pluck('jawaban', 'soal_id')
            ->toArray();

        return view('pelamar.kuis.kerjakan', compact(
            'pelamar', 'pengerjaan', 'kuis', 'soals', 'sisaDetik', 'jawabanTersimpan'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    // SIMPAN JAWABAN SEMENTARA (AJAX — auto-save tiap soal)
    // ─────────────────────────────────────────────────────────────
    public function simpanJawaban(Request $request, $pengerjaanId)
    {
        $pelamar    = $this->getPelamar();
        $pengerjaan = PengerjaanPelamar::findOrFail($pengerjaanId);

        abort_if($pengerjaan->id_pelamar !== $pelamar->id, 403);
        abort_if($pengerjaan->status === 'selesai', 422, 'Kuis sudah selesai.');

        $data = $request->validate([
            'soal_id' => ['required', 'exists:soals,id'],
            'jawaban' => ['required', 'in:a,b,c,d'],
        ]);

        $soal = Soal::findOrFail($data['soal_id']);

        // Upsert jawaban
        JawabanPelamar::updateOrCreate(
            [
                'pengerjaan_id' => $pengerjaanId,
                'soal_id'       => $data['soal_id'],
            ],
            [
                'jawaban' => $data['jawaban'],
                'benar'   => $data['jawaban'] === $soal->jawaban_benar,
            ]
        );

        // Hitung progress
        $totalSoal    = Soal::where('id_kuis', $pengerjaan->id_kuis)->count();
        $sudahDijawab = JawabanPelamar::where('pengerjaan_id', $pengerjaanId)->count();

        return response()->json([
            'success'         => true,
            'sudah_dijawab'   => $sudahDijawab,
            'total_soal'      => $totalSoal,
            'persentase'      => $totalSoal > 0 ? round(($sudahDijawab / $totalSoal) * 100) : 0,
        ]);
    }

    // ─────────────────────────────────────────────────────────────
    // SUBMIT / KUMPULKAN KUIS
    // ─────────────────────────────────────────────────────────────
    public function submit(Request $request, $pengerjaanId)
    {
        $pelamar    = $this->getPelamar();
        $pengerjaan = PengerjaanPelamar::findOrFail($pengerjaanId);

        abort_if($pengerjaan->id_pelamar !== $pelamar->id, 403);
        abort_if($pengerjaan->status === 'selesai', 422, 'Kuis sudah dikumpulkan.');

        return $this->prosesSubmit($pengerjaan, $request->all(), false);
    }

    // ─────────────────────────────────────────────────────────────
    // INTERNAL — Proses hitung nilai & simpan hasil
    // ─────────────────────────────────────────────────────────────
    private function prosesSubmit(PengerjaanPelamar $pengerjaan, array $requestData, bool $autoSubmit)
    {
        DB::transaction(function () use ($pengerjaan) {
            $totalSoal = Soal::where('id_kuis', $pengerjaan->id_kuis)->count();
            $benar     = JawabanPelamar::where('pengerjaan_id', $pengerjaan->id)
                ->where('benar', true)
                ->count();

            $nilai = $totalSoal > 0 ? round(($benar / $totalSoal) * 100, 2) : 0;

            $pengerjaan->update([
                'status' => 'selesai',
                'nilai'  => $nilai,
            ]);
        });

        // Hapus session waktu mulai
        session()->forget("kuis_mulai_{$pengerjaan->id}");

        $pesan = $autoSubmit
            ? 'Waktu habis! Kuis dikumpulkan otomatis.'
            : 'Kuis berhasil dikumpulkan.';

        return redirect()->route('pelamar.kuis.hasil', $pengerjaan->id)
            ->with('success', $pesan);
    }

    // ─────────────────────────────────────────────────────────────
    // HALAMAN HASIL KUIS PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function hasil($pengerjaanId)
    {
        $pelamar    = $this->getPelamar();
        $pengerjaan = PengerjaanPelamar::with([
            'kuis.soal',
            'jawaban.soal',
        ])->findOrFail($pengerjaanId);

        abort_if($pengerjaan->id_pelamar !== $pelamar->id, 403);

        $totalSoal  = $pengerjaan->kuis->soal->count();
        $benar      = $pengerjaan->jawaban->where('benar', true)->count();
        $salah      = $pengerjaan->jawaban->where('benar', false)->count();
        $tidakDijawab = $totalSoal - $pengerjaan->jawaban->count();

        return view('pelamar.kuis.hasil', compact(
            'pelamar', 'pengerjaan', 'totalSoal', 'benar', 'salah', 'tidakDijawab'
        ));
    }

    // ─────────────────────────────────────────────────────────────
    // SDM — LIST HASIL KUIS SEMUA PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function sdmIndex(Request $request)
    {
        $query = PengerjaanPelamar::with(['pelamar.posisi', 'kuis'])
            ->latest();

        if ($request->filled('kuis')) {
            $query->where('id_kuis', $request->kuis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $q = $request->search;
            $query->whereHas('pelamar', fn($s) =>
                $s->where('nama', 'like', "%{$q}%")
                  ->orWhere('nomer_peserta', 'like', "%{$q}%")
            );
        }

        $pengerjaans = $query->paginate(15)->withQueryString();
        $kuiss       = Kuis::orderBy('nama_kuis')->get();

        return view('sdm.pengerjaan.index', compact('pengerjaans', 'kuiss'));
    }

    // ─────────────────────────────────────────────────────────────
    // SDM — DETAIL HASIL KUIS SATU PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function sdmDetail($pengerjaanId)
    {
        $pengerjaan = PengerjaanPelamar::with([
            'pelamar.posisi',
            'kuis.soal',
            'jawaban.soal',
        ])->findOrFail($pengerjaanId);

        $totalSoal    = $pengerjaan->kuis->soal->count();
        $benar        = $pengerjaan->jawaban->where('benar', true)->count();
        $salah        = $pengerjaan->jawaban->where('benar', false)->count();
        $tidakDijawab = $totalSoal - $pengerjaan->jawaban->count();

        return view('sdm.pengerjaan.detail', compact(
            'pengerjaan', 'totalSoal', 'benar', 'salah', 'tidakDijawab'
        ));
    }
}
