<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();
        return view('outlet.index', compact('outlet'));
    }

    public function create()
    {
        return view('outlet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_outlet' => 'required',
            'telp_outlet' => 'required',
            'alamat_outlet' => 'required'
        ]);

        Outlet::create($request->all());

        return redirect()->route('outlet.index')->with('message', 'Data Harga Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('outlet.show', compact('outlet'));
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('outlet.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);

        $request->validate([
            'nama_outlet' => 'required',
            'telp_outlet' => 'required',
            'alamat_outlet' => 'required'
        ]);

        $outlet->nama_outlet = $request->nama_outlet;
        $outlet->telp_outlet = $request->telp_outlet;
        $outlet->alamat_outlet = $request->alamat_outlet;

        $outlet->save();
        return redirect()->route('outlet.index')->with('message', 'Data Harga Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();

        return redirect()->route('outlet.index')->with('message', 'Data Harga Barang berhasil dihapus.');
    }
}
