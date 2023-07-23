<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use Illuminate\Http\Request;

class DaftarHargaController extends Controller
{
    public function index()
    {
        $daftar_harga = DaftarHarga::all();
        return view('daftar_harga.index', compact('daftar_harga'));
    }

    public function create()
    {
        return view('daftar_harga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kilogram' => 'required',
            'harga' => 'required'
        ]);

        DaftarHarga::create($request->all());

        return redirect()->route('daftar_harga.index')->with('message', 'Data Harga Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $daftar_harga = DaftarHarga::findOrFail($id);
        return view('daftar_harga.show', compact('daftar_harga'));
    }

    public function edit($id)
    {
        $daftar_harga = DaftarHarga::findOrFail($id);
        return view('daftar_harga.edit', compact('daftar_harga'));
    }

    public function update(Request $request, $id)
    {
        $daftar_harga = DaftarHarga::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'kilogram' => 'required',
            'harga' => 'required'
        ]);

        $daftar_harga->nama_barang = $request->nama_barang;
        $daftar_harga->kilogram = $request->kilogram;
        $daftar_harga->harga = $request->harga;

        $daftar_harga->save();
        return redirect()->route('daftar_harga.index')->with('message', 'Data Harga Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $daftar_harga = DaftarHarga::findOrFail($id);
        $daftar_harga->delete();

        return redirect()->route('daftar_harga.index')->with('message', 'Data Harga Barang berhasil dihapus.');
    }
}
