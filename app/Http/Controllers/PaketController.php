<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::orderBy('id_paket')->get();
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required|in:SD,SMP,SMA,Biaya Pendaftaran',
            'harga' => 'required|numeric|min:0',
            'biaya_pendaftaran' => 'nullable|numeric|min:0',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat' => 'required|in:SD,SMP,SMA,Biaya Pendaftaran',
            'harga' => 'required|numeric|min:0',
            'biaya_pendaftaran' => 'nullable|numeric|min:0',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}