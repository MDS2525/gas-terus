@extends('layout.app')

@section('title', 'Detail Outlet')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Daftar Outlet</h6>
        </div>
        <div class="card-body">
            <p><strong>Nama Outlet:</strong> {{ $outlet->nama_barang }}</p>
            <p><strong>No telp Outlet:</strong> {{ $outlet->nama_barang }}</p>
            <p><strong>Alamat Outlet:</strong> {{ $outlet->harga }}</p>

            <div class="mt-3">
                <a href="{{ route('outlet.edit', $outlet->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('outlet.destroy', $outlet->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
