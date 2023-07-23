@extends('layout.app')

@section('title', 'Edit Harga Barang')

@section('content')

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Harga Barang</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('daftar_harga.update', $daftar_harga->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                        value="{{ $daftar_harga->nama_barang }}" required>
                </div>
                <div class="form-group">
                    <label for="kilogram">Berat (Kilogram)</label>
                    <input type="text" name="kilogram" id="kilogram" class="form-control"
                        value="{{ $daftar_harga->kilogram }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control"
                        value="{{ $daftar_harga->harga }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
