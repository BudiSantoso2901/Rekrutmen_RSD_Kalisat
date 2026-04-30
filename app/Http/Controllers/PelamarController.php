<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PelamarController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // SHOW FORM PENDAFTARAN  (publik — tidak perlu login)
    // ─────────────────────────────────────────────────────────────
    public function showDaftar()
    {
        $posisi = Posisi::where('tanggal_ditutup', '>=', now()->toDateString())
            ->orderBy('nama_posisi')
            ->get();

        return view('pelamar.daftar', compact('posisi'));
    }

    // ─────────────────────────────────────────────────────────────
    // PROCESS PENDAFTARAN
    // ─────────────────────────────────────────────────────────────
    public function daftar(Request $request)
    {
        $data = $request->validate([
            'nama'                    => ['required', 'string', 'max:150'],
            'email'                   => ['required', 'email', 'max:150', 'unique:pelamars,email'],
            'no_hp'                   => ['required', 'string', 'regex:/^[0-9]{10,14}$/'],
            'alamat'                  => ['required', 'string', 'max:500'],
            'kota_domisili'           => ['required', 'string', 'max:100'],
            'id_posisi'               => ['required', 'exists:posisis,id'],
            'pengalaman_kerja'        => ['required', 'in:ya,tidak'],
            'keterangan_pengalaman'   => ['nullable', 'string', 'max:1000'],
            'file_upload'             => [
                'required', 'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120', // 5 MB
            ],
            'password'                => [
                'required', 'confirmed', 'min:8',
            ],
        ], [
            'nama.required'              => 'Nama lengkap wajib diisi.',
            'email.required'             => 'Email wajib diisi.',
            'email.unique'               => 'Email sudah terdaftar sebagai pelamar.',
            'no_hp.required'             => 'Nomor HP wajib diisi.',
            'no_hp.regex'                => 'Nomor HP harus 10–14 digit angka.',
            'alamat.required'            => 'Alamat wajib diisi.',
            'kota_domisili.required'     => 'Kota domisili wajib diisi.',
            'id_posisi.required'         => 'Pilih posisi yang dilamar.',
            'id_posisi.exists'           => 'Posisi tidak ditemukan.',
            'pengalaman_kerja.required'  => 'Pengalaman kerja wajib dipilih.',
            'file_upload.required'       => 'CV / berkas wajib diunggah.',
            'file_upload.mimes'          => 'File harus berformat PDF, JPG, atau PNG.',
            'file_upload.max'            => 'Ukuran file maksimal 5 MB.',
            'password.required'          => 'Password wajib diisi.',
            'password.confirmed'         => 'Konfirmasi password tidak cocok.',
            'password.min'               => 'Password minimal 8 karakter.',
        ]);

        // Validasi posisi masih buka
        $posisi = Posisi::findOrFail($data['id_posisi']);
        if ($posisi->tanggal_ditutup < now()->toDateString()) {
            return back()
                ->withErrors(['id_posisi' => 'Pendaftaran untuk posisi ini sudah ditutup.'])
                ->withInput();
        }

        // Upload file
        $file      = $request->file('file_upload');
        $fileName  = time() . '_' . Str::slug($data['nama']) . '.' . $file->getClientOriginalExtension();
        $filePath  = $file->storeAs('berkas_pelamar', $fileName, 'public');

        $pelamar = Pelamar::create([
            'nama'                  => $data['nama'],
            'email'                 => $data['email'],
            'no_hp'                 => $data['no_hp'],
            'alamat'                => $data['alamat'],
            'kota_domisili'         => $data['kota_domisili'],
            'id_posisi'             => $data['id_posisi'],
            'pengalaman_kerja'      => $data['pengalaman_kerja'],
            'keterangan_pengalaman' => $data['keterangan_pengalaman'] ?? null,
            'file_upload'           => $filePath,
            'password'              => Hash::make($data['password']),
            'status_pelamar'        => 'menunggu', // default
            'nomer_peserta'         => null,       // digenerate saat diterima
        ]);

        return redirect()->route('pelamar.sukses', ['id' => $pelamar->id])
            ->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda melalui email.');
    }

    // ─────────────────────────────────────────────────────────────
    // HALAMAN SUKSES DAFTAR
    // ─────────────────────────────────────────────────────────────
    public function sukses(Request $request, $id)
    {
        $pelamar = Pelamar::with('posisi')->findOrFail($id);
        return view('pelamar.sukses', compact('pelamar'));
    }

    // ─────────────────────────────────────────────────────────────
    // LOGIN PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function showLogin()
    {
        return view('pelamar.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $pelamar = Pelamar::where('email', $data['email'])->first();

        if (! $pelamar || ! Hash::check($data['password'], $pelamar->password)) {
            return back()
                ->withErrors(['email' => 'Email atau password salah.'])
                ->withInput($request->only('email'));
        }

        session(['pelamar_id' => $pelamar->id, 'pelamar_nama' => $pelamar->nama]);

        return redirect()->route('pelamar.dashboard')
            ->with('success', "Selamat datang, {$pelamar->nama}!");
    }

    // ─────────────────────────────────────────────────────────────
    // DASHBOARD PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function dashboard()
    {
        $pelamar = Pelamar::with(['posisi', 'pengerjaan.kuis'])->findOrFail(session('pelamar_id'));

        return view('pelamar.dashboard', compact('pelamar'));
    }

    // ─────────────────────────────────────────────────────────────
    // LOGOUT PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        $request->session()->forget(['pelamar_id', 'pelamar_nama']);
        return redirect()->route('pelamar.login')->with('success', 'Anda telah keluar.');
    }

    // ─────────────────────────────────────────────────────────────
    // SDM — LIST SEMUA PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $query = Pelamar::with('posisi');

        if ($request->filled('posisi')) {
            $query->where('id_posisi', $request->posisi);
        }

        if ($request->filled('status')) {
            $query->where('status_pelamar', $request->status);
        }

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('nomer_peserta', 'like', "%{$q}%");
            });
        }

        $pelamars = $query->latest()->paginate(15)->withQueryString();
        $posisis  = Posisi::orderBy('nama_posisi')->get();

        return view('sdm.pelamar.index', compact('pelamars', 'posisis'));
    }

    // ─────────────────────────────────────────────────────────────
    // SDM — DETAIL PELAMAR
    // ─────────────────────────────────────────────────────────────
    public function show($id)
    {
        $pelamar = Pelamar::with(['posisi', 'pengerjaan.kuis', 'pengerjaan.jawaban'])->findOrFail($id);
        return view('sdm.pelamar.show', compact('pelamar'));
    }

    // ─────────────────────────────────────────────────────────────
    // SDM — UPDATE STATUS PELAMAR + GENERATE NOMER PESERTA
    // ─────────────────────────────────────────────────────────────
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pelamar' => ['required', 'in:menunggu,diproses,diterima,ditolak'],
        ], [
            'status_pelamar.required' => 'Status wajib dipilih.',
            'status_pelamar.in'       => 'Status tidak valid.',
        ]);

        $pelamar = Pelamar::findOrFail($id);
        $oldStatus = $pelamar->status_pelamar;
        $newStatus = $request->status_pelamar;

        // Generate nomer peserta saat status berubah menjadi "diterima"
        if ($newStatus === 'diterima' && $oldStatus !== 'diterima') {
            if (is_null($pelamar->nomer_peserta)) {
                $pelamar->nomer_peserta = $this->generateNomerPeserta($pelamar);
            }
        }

        // Hapus nomer peserta jika status kembali ke selain diterima
        if ($newStatus !== 'diterima' && $oldStatus === 'diterima') {
            $pelamar->nomer_peserta = null;
        }

        $pelamar->status_pelamar = $newStatus;
        $pelamar->save();

        $pesanStatus = [
            'menunggu'  => 'sedang menunggu verifikasi',
            'diproses'  => 'sedang diproses',
            'diterima'  => 'diterima dengan nomor peserta ' . $pelamar->nomer_peserta,
            'ditolak'   => 'ditolak',
        ];

        return back()->with('success',
            "Status {$pelamar->nama} berhasil diubah: {$pesanStatus[$newStatus]}."
        );
    }

    // ─────────────────────────────────────────────────────────────
    // HELPER — Generate Nomer Peserta
    // Format: RSD-{TAHUN}{BULAN}-{ID:04d}
    // Contoh: RSD-202506-0001
    // ─────────────────────────────────────────────────────────────
    private function generateNomerPeserta(Pelamar $pelamar): string
    {
        $prefix = 'RSD-' . now()->format('Ym');
        $seq    = str_pad($pelamar->id, 4, '0', STR_PAD_LEFT);

        return "{$prefix}-{$seq}";
    }
}
