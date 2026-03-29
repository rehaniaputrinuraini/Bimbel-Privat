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
        $murids = Murid::all(); 
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
        // Validasi disesuaikan dengan atribut 'name' di form Blade kamu
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'kelas'          => 'nullable|string|max:50',
            'asal_sekolah'   => 'nullable|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp_siswa'    => 'nullable|string|max:20',
            'paket_awal'     => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'pilihan_paket'  => 'nullable|string|max:100',
            'no_hp_ortu'     => 'nullable|string|max:20',
            'tahun_masuk'    => 'nullable|digits:4',
        ]);

        // Simpan semua data yang dikirim dari form
        Murid::create($request->all());

        return redirect()->route('murid.index')
            ->with('success', 'Murid berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data murid.
     */
    public function edit($id)
    {
        // Menggunakan findOrFail agar jika ID tidak ketemu muncul error 404
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    /**
     * Memperbarui data murid di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'kelas'          => 'nullable|string|max:50',
            'asal_sekolah'   => 'nullable|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp_siswa'    => 'nullable|string|max:20',
            'paket_awal'     => 'nullable|string|max:100',
            'nama_orang_tua' => 'nullable|string|max:255',
            'pilihan_paket'  => 'nullable|string|max:100',
            'no_hp_ortu'     => 'nullable|string|max:20',
            'tahun_masuk'    => 'nullable|digits:4',
        ]);

        $murid = Murid::findOrFail($id);
        
        // Melakukan update data berdasarkan input baru
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