<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index(Request $request)
{
    // 1. Ambil semua data unik untuk isi dropdown filter
    $filter_kelas = Murid::distinct()->pluck('kelas')->filter();
    $filter_tahun = Murid::distinct()->pluck('tahun_masuk')->filter();

    // 2. Mulai query data murid
    $query = Murid::query();

    // 3. Jalankan filter jika ada yang dipilih
    if ($request->has('kelas') && $request->kelas != '') {
        $query->where('kelas', $request->kelas);
    }

    if ($request->has('tahun') && $request->tahun != '') {
        $query->where('tahun_masuk', $request->tahun);
    }

    $murids = $query->get();

    return view('murid.index', compact('murids', 'filter_kelas', 'filter_tahun'));
}

    public function create() {
        return view('murid.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lengkap_murid' => 'required|string|max:255',
            'kelas'              => 'nullable',
            'asal_sekolah'       => 'nullable',
            'alamat_murid'       => 'nullable',
            'no_hp_murid'        => 'nullable',
            'nama_orang_tua'     => 'nullable',
            'no_hp_orang_tua'    => 'nullable',
            'paket_awal'         => 'nullable',
            'pilihan_paket'      => 'nullable',
            'tahun_masuk'        => 'nullable|digits:4',
        ]);

        Murid::create($request->all());
        return redirect()->route('murid.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id) {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_lengkap_murid' => 'required|string|max:255',
            'kelas'              => 'nullable',
            'asal_sekolah'       => 'nullable',
            'alamat_murid'       => 'nullable',
            'no_hp_murid'        => 'nullable',
            'nama_orang_tua'     => 'nullable',
            'no_hp_orang_tua'    => 'nullable',
            'paket_awal'         => 'nullable',
            'pilihan_paket'      => 'nullable',
            'tahun_masuk'        => 'nullable|digits:4',
        ]);

        $murid = Murid::findOrFail($id);
        $murid->update($request->all());

        return redirect()->route('murid.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id) {
        Murid::findOrFail($id)->delete();
        return redirect()->route('murid.index')->with('success', 'Data dihapus');
    }
}