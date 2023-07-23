@extends('layout.app')

@section('title', 'Detail Harga Barang')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Daftar Harga Barang</h6>
        </div>
        <div class="card-body">
            <p><strong>Nama Barang:</strong> {{ $daftar_harga->nama_barang }}</p>
            <p><strong>Berat (kilogram):</strong> {{ $daftar_harga->nama_barang }}</p>
            <p><strong>Harga:</strong> {{ $daftar_harga->harga }}</p>

            <div class="mt-3">
                <a href="{{ route('daftar_harga.edit', $daftar_harga->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('daftar_harga.destroy', $daftar_harga->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
