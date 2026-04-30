<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    // ─────────────────────────────────────────────────────────────
    // LIST POSISI
    // ─────────────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $query = Posisi::withCount('pelamar');

        if ($request->filled('search')) {
            $query->where('nama_posisi', 'like', '%' . $request->search . '%');
        }

        $posisis = $query->latest()->paginate(10)->withQueryString();

        return view('sdm.posisi.index', compact('posisis'));
    }

    // ─────────────────────────────────────────────────────────────
    // FORM TAMBAH
    // ─────────────────────────────────────────────────────────────
    public function create()
    {
        return view('sdm.posisi.create');
    }

    // ─────────────────────────────────────────────────────────────
    // SIMPAN POSISI BARU
    // ─────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_posisi'      => ['required', 'string', 'max:150', 'unique:posisis,nama_posisi'],
            'deskripsi_posisi' => ['required', 'string', 'max:2000'],
            'tanggal_ditutup'  => ['required', 'date', 'after:today'],
        ], [
            'nama_posisi.required'      => 'Nama posisi wajib diisi.',
            'nama_posisi.unique'        => 'Posisi dengan nama tersebut sudah ada.',
            'deskripsi_posisi.required' => 'Deskripsi posisi wajib diisi.',
            'tanggal_ditutup.required'  => 'Tanggal tutup pendaftaran wajib diisi.',
            'tanggal_ditutup.after'     => 'Tanggal tutup harus setelah hari ini.',
        ]);

        Posisi::create($data);

        return redirect()->route('posisi.index')
            ->with('success', "Posisi \"{$data['nama_posisi']}\" berhasil ditambahkan.");
    }

    // ─────────────────────────────────────────────────────────────
    // FORM EDIT
    // ─────────────────────────────────────────────────────────────
    public function edit($id)
    {
        $posisi = Posisi::findOrFail($id);
        return view('sdm.posisi.edit', compact('posisi'));
    }

    // ─────────────────────────────────────────────────────────────
    // UPDATE POSISI
    // ─────────────────────────────────────────────────────────────
    public function update(Request $request, $id)
    {
        $posisi = Posisi::findOrFail($id);

        $data = $request->validate([
            'nama_posisi'      => ['required', 'string', 'max:150', "unique:posisis,nama_posisi,{$id}"],
            'deskripsi_posisi' => ['required', 'string', 'max:2000'],
            'tanggal_ditutup'  => ['required', 'date'],
        ], [
            'nama_posisi.required'      => 'Nama posisi wajib diisi.',
            'nama_posisi.unique'        => 'Posisi dengan nama tersebut sudah ada.',
            'deskripsi_posisi.required' => 'Deskripsi posisi wajib diisi.',
            'tanggal_ditutup.required'  => 'Tanggal tutup wajib diisi.',
        ]);

        $posisi->update($data);

        return redirect()->route('posisi.index')
            ->with('success', "Posisi \"{$posisi->nama_posisi}\" berhasil diperbarui.");
    }

    // ─────────────────────────────────────────────────────────────
    // HAPUS POSISI
    // ─────────────────────────────────────────────────────────────
    public function destroy($id)
    {
        $posisi = Posisi::withCount('pelamar')->findOrFail($id);

        if ($posisi->pelamar_count > 0) {
            return back()->withErrors([
                'posisi' => "Posisi \"{$posisi->nama_posisi}\" tidak dapat dihapus karena sudah memiliki {$posisi->pelamar_count} pelamar.",
            ]);
        }

        $nama = $posisi->nama_posisi;
        $posisi->delete();

        return redirect()->route('posisi.index')
            ->with('success', "Posisi \"{$nama}\" berhasil dihapus.");
    }
}
