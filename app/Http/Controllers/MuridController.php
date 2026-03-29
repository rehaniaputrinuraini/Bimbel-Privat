<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Menampilkan daftar semua murid.
     */
    public function index()
{
    // Mengambil semua data dari database
    $murids = \App\Models\Murid::all(); 

    // Mengirim data ke file resources/views/murid/index.blade.php
    return view('murid.index', compact('murids'));
}

    /**
     * Menampilkan form untuk menambah murid baru.
     */
    public function create()
    {
        return view('murid.create');
    }

    /**
     * Menyimpan data murid baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap_murid' => 'required|string|max:35',
            'kelas' => 'nullable|string|max:10',
            'asal_sekolah' => 'nullable|string|max:35',
            'alamat_murid' => 'nullable|string',
            'no_hp_murid' => 'nullable|string|max:15',
            'nama_orang_tua' => 'nullable|string|max:35',
            'no_hp_orang_tua' => 'nullable|string|max:15',
            'paket_awal' => 'nullable|numeric',
            'pilihan_paket' => 'nullable|in:SD,SMP,SMA',
            'tahun_masuk' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'status_pembayaran' => 'nullable|in:lunas,belum,tunggak,uang_muka',
            'total_piutang' => 'nullable|numeric',
            'total_uang_muka' => 'nullable|numeric',
        ]);

        Murid::create($request->all());

        return redirect()->route('murid.index')
            ->with('success', 'Murid berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu murid.
     */
    public function show($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.show', compact('murid'));
    }

    /**
     * Menampilkan form untuk mengedit data murid.
     */
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    /**
     * Memperbarui data murid di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap_murid' => 'required|string|max:35',
            'kelas' => 'nullable|string|max:10',
            'asal_sekolah' => 'nullable|string|max:35',
            'alamat_murid' => 'nullable|string',
            'no_hp_murid' => 'nullable|string|max:15',
            'nama_orang_tua' => 'nullable|string|max:35',
            'no_hp_orang_tua' => 'nullable|string|max:15',
            'paket_awal' => 'nullable|numeric',
            'pilihan_paket' => 'nullable|in:SD,SMP,SMA',
            'tahun_masuk' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'status_pembayaran' => 'nullable|in:lunas,belum,tunggak,uang_muka',
            'total_piutang' => 'nullable|numeric',
            'total_uang_muka' => 'nullable|numeric',
        ]);

        $murid = Murid::findOrFail($id);
        $murid->update($request->all());

        return redirect()->route('murid.index')
            ->with('success', 'Data murid berhasil diperbarui.');
    }

    /**
     * Menghapus data murid dari database.
     */
    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return redirect()->route('murid.index')
            ->with('success', 'Murid berhasil dihapus.');
    }
}