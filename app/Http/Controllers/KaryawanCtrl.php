<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanCtrl extends Controller
{
    public function index()
    {
        return view(
            'karyawan.index',
            [
                'karyawan' => Karyawan::latest()->get()
            ]
        );
    }

    public function detail(Karyawan $karyawan)
    {
        return view('karyawan.detail', compact('karyawan'));
    }


    public function add()
    {
        return view('karyawan.insert');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
            ]
        );

        Karyawan::create(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]
        );

        return redirect()->route('karyawan')->with('message', 'Data Berhasil Ditambahkan');
    }

    public function delete(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan')->with('message', 'Data Berhasil Dihapus');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
            ]
        );

        $karyawan->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]
        );

        return redirect()->route('karyawan')->with('message', 'Data Berhasil Diupdate');
    }
}
