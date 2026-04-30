<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Posisi;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuisController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // LIST KUIS  (IT & SDM)
    // ─────────────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $query = Kuis::with(['posisi', 'pembuat'])
            ->withCount('soal');   // soal() harus ada di Model Kuis — lihat catatan

        if ($request->filled('posisi')) {
            $query->where('posisi_id', $request->posisi);
        }

        if ($request->filled('search')) {
            $query->where('nama_kuis', 'like', '%' . $request->search . '%');
        }

        $kuiss  = $query->latest()->paginate(10)->withQueryString();
        $posisis = Posisi::orderBy('nama_posisi')->get();

        return view('sdm.kuis.index', compact('kuiss', 'posisis'));
    }

    // ─────────────────────────────────────────────────────────────
    // FORM BUAT KUIS BARU
    // ─────────────────────────────────────────────────────────────
    public function create()
    {
        $posisis = Posisi::orderBy('nama_posisi')->get();
        return view('sdm.kuis.create', compact('posisis'));
    }

    // ─────────────────────────────────────────────────────────────
    // SIMPAN KUIS BARU
    // ─────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kuis'  => ['required', 'string', 'max:200'],
            'posisi_id'  => ['required', 'exists:posisis,id'],
            'waktu'      => ['required', 'integer', 'min:5', 'max:300'],
            'deskripsi'  => ['nullable', 'string', 'max:1000'],
        ], [
            'nama_kuis.required'  => 'Nama kuis wajib diisi.',
            'posisi_id.required'  => 'Posisi wajib dipilih.',
            'posisi_id.exists'    => 'Posisi tidak ditemukan.',
            'waktu.required'      => 'Waktu pengerjaan wajib diisi.',
            'waktu.integer'       => 'Waktu harus berupa angka.',
            'waktu.min'           => 'Waktu minimal 5 menit.',
            'waktu.max'           => 'Waktu maksimal 300 menit.',
        ]);

        $kuis = Kuis::create([
            'nama_kuis'  => $data['nama_kuis'],
            'posisi_id'  => $data['posisi_id'],
            'waktu'      => $data['waktu'],
            'deskripsi'  => $data['deskripsi'] ?? null,
            'dibuat_oleh' => Auth::id(),
        ]);

        return redirect()->route('kuis.soal.index', $kuis->id)
            ->with('success', "Kuis \"{$kuis->nama_kuis}\" berhasil dibuat. Silakan tambahkan soal.");
    }

    // ─────────────────────────────────────────────────────────────
    // DETAIL / PREVIEW KUIS
    // ─────────────────────────────────────────────────────────────
    public function show($id)
    {
        $kuis = Kuis::with(['posisi', 'pembuat', 'soal'])->findOrFail($id);
        return view('sdm.kuis.show', compact('kuis'));
    }

    // ─────────────────────────────────────────────────────────────
    // FORM EDIT KUIS
    // ─────────────────────────────────────────────────────────────
    public function edit($id)
    {
        $kuis    = Kuis::findOrFail($id);
        $posisis = Posisi::orderBy('nama_posisi')->get();
        return view('sdm.kuis.edit', compact('kuis', 'posisis'));
    }

    // ─────────────────────────────────────────────────────────────
    // UPDATE KUIS
    // ─────────────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        $kuis = Kuis::findOrFail($id);

        $data = $request->validate([
            'nama_kuis' => ['required', 'string', 'max:200'],
            'posisi_id' => ['required', 'exists:posisis,id'],
            'waktu'     => ['required', 'integer', 'min:5', 'max:300'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
        ], [
            'nama_kuis.required' => 'Nama kuis wajib diisi.',
            'posisi_id.required' => 'Posisi wajib dipilih.',
            'waktu.required'     => 'Waktu wajib diisi.',
            'waktu.min'          => 'Waktu minimal 5 menit.',
        ]);

        $kuis->update($data);

        return redirect()->route('kuis.show', $kuis->id)
            ->with('success', "Kuis \"{$kuis->nama_kuis}\" berhasil diperbarui.");
    }

    // ─────────────────────────────────────────────────────────────
    // HAPUS KUIS
    // ─────────────────────────────────────────────────────────────
    public function destroy($id)
    {
        $kuis = Kuis::withCount('soal')->findOrFail($id);
        $nama = $kuis->nama_kuis;

        DB::transaction(function () use ($kuis) {
            // Hapus soal-soal terlebih dahulu
            Soal::where('id_kuis', $kuis->id)->delete();
            $kuis->delete();
        });

        return redirect()->route('kuis.index')
            ->with('success', "Kuis \"{$nama}\" berhasil dihapus.");
    }

    // ═══════════════════════════════════════════════════════════════
    // ─── MANAJEMEN SOAL ────────────────────────────────────────────
    // ═══════════════════════════════════════════════════════════════

    // ─────────────────────────────────────────────────────────────
    // LIST SOAL DALAM KUIS
    // ─────────────────────────────────────────────────────────────
    public function soalIndex($kuisId)
    {
        $kuis  = Kuis::with('posisi')->findOrFail($kuisId);
        $soals = Soal::where('id_kuis', $kuisId)->orderBy('id')->get();

        return view('sdm.kuis.soal.index', compact('kuis', 'soals'));
    }

    // ─────────────────────────────────────────────────────────────
    // FORM TAMBAH SOAL
    // ─────────────────────────────────────────────────────────────
    public function soalCreate($kuisId)
    {
        $kuis = Kuis::findOrFail($kuisId);
        return view('sdm.kuis.soal.create', compact('kuis'));
    }

    // ─────────────────────────────────────────────────────────────
    // SIMPAN SOAL BARU
    // ─────────────────────────────────────────────────────────────
    public function soalStore(Request $request, $kuisId)
    {
        $kuis = Kuis::findOrFail($kuisId);

        $data = $request->validate([
            'pertanyaan'    => ['required', 'string', 'max:2000'],
            'jawaban_a'     => ['required', 'string', 'max:500'],
            'jawaban_b'     => ['required', 'string', 'max:500'],
            'jawaban_c'     => ['required', 'string', 'max:500'],
            'jawaban_d'     => ['required', 'string', 'max:500'],
            'jawaban_benar' => ['required', 'in:a,b,c,d'],
            'foto_soal'     => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'pertanyaan.required'    => 'Pertanyaan wajib diisi.',
            'jawaban_a.required'     => 'Jawaban A wajib diisi.',
            'jawaban_b.required'     => 'Jawaban B wajib diisi.',
            'jawaban_c.required'     => 'Jawaban C wajib diisi.',
            'jawaban_d.required'     => 'Jawaban D wajib diisi.',
            'jawaban_benar.required' => 'Jawaban benar wajib dipilih.',
            'jawaban_benar.in'       => 'Jawaban benar harus A, B, C, atau D.',
            'foto_soal.image'        => 'File harus berupa gambar.',
            'foto_soal.max'          => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_soal')) {
            $fotoPath = $request->file('foto_soal')
                ->store("foto_soal/{$kuisId}", 'public');
        }

        Soal::create([
            'id_kuis'       => $kuisId,
            'pertanyaan'    => $data['pertanyaan'],
            'jawaban_a'     => $data['jawaban_a'],
            'jawaban_b'     => $data['jawaban_b'],
            'jawaban_c'     => $data['jawaban_c'],
            'jawaban_d'     => $data['jawaban_d'],
            'jawaban_benar' => $data['jawaban_benar'],
            'foto_soal'     => $fotoPath,
        ]);

        if ($request->boolean('tambah_lagi')) {
            return redirect()->route('kuis.soal.create', $kuisId)
                ->with('success', 'Soal berhasil ditambahkan. Tambah soal berikutnya.');
        }

        return redirect()->route('kuis.soal.index', $kuisId)
            ->with('success', 'Soal berhasil ditambahkan.');
    }

    // ─────────────────────────────────────────────────────────────
    // FORM EDIT SOAL
    // ─────────────────────────────────────────────────────────────
    public function soalEdit($kuisId, $soalId)
    {
        $kuis = Kuis::findOrFail($kuisId);
        $soal = Soal::where('id_kuis', $kuisId)->findOrFail($soalId);

        return view('sdm.kuis.soal.edit', compact('kuis', 'soal'));
    }

    // ─────────────────────────────────────────────────────────────
    // UPDATE SOAL
    // ─────────────────────────────────────────────────────────────
    public function soalUpdate(Request $request, $kuisId, $soalId)
    {
        $soal = Soal::where('id_kuis', $kuisId)->findOrFail($soalId);

        $data = $request->validate([
            'pertanyaan'    => ['required', 'string', 'max:2000'],
            'jawaban_a'     => ['required', 'string', 'max:500'],
            'jawaban_b'     => ['required', 'string', 'max:500'],
            'jawaban_c'     => ['required', 'string', 'max:500'],
            'jawaban_d'     => ['required', 'string', 'max:500'],
            'jawaban_benar' => ['required', 'in:a,b,c,d'],
            'foto_soal'     => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'hapus_foto'    => ['nullable', 'boolean'],
        ], [
            'pertanyaan.required'    => 'Pertanyaan wajib diisi.',
            'jawaban_benar.required' => 'Jawaban benar wajib dipilih.',
            'jawaban_benar.in'       => 'Jawaban benar harus A, B, C, atau D.',
        ]);

        // Hapus foto lama jika diminta
        if ($request->boolean('hapus_foto') && $soal->foto_soal) {
            \Storage::disk('public')->delete($soal->foto_soal);
            $soal->foto_soal = null;
        }

        // Upload foto baru jika ada
        if ($request->hasFile('foto_soal')) {
            if ($soal->foto_soal) {
                \Storage::disk('public')->delete($soal->foto_soal);
            }
            $soal->foto_soal = $request->file('foto_soal')
                ->store("foto_soal/{$kuisId}", 'public');
        }

        $soal->update([
            'pertanyaan'    => $data['pertanyaan'],
            'jawaban_a'     => $data['jawaban_a'],
            'jawaban_b'     => $data['jawaban_b'],
            'jawaban_c'     => $data['jawaban_c'],
            'jawaban_d'     => $data['jawaban_d'],
            'jawaban_benar' => $data['jawaban_benar'],
            'foto_soal'     => $soal->foto_soal,
        ]);

        return redirect()->route('kuis.soal.index', $kuisId)
            ->with('success', 'Soal berhasil diperbarui.');
    }

    // ─────────────────────────────────────────────────────────────
    // HAPUS SOAL
    // ─────────────────────────────────────────────────────────────
    public function soalDestroy($kuisId, $soalId)
    {
        $soal = Soal::where('id_kuis', $kuisId)->findOrFail($soalId);

        if ($soal->foto_soal) {
            \Storage::disk('public')->delete($soal->foto_soal);
        }

        $soal->delete();

        return redirect()->route('kuis.soal.index', $kuisId)
            ->with('success', 'Soal berhasil dihapus.');
    }
}
