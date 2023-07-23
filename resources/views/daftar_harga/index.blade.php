@extends('layout.app')

@section('title', 'Daftar Harga')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('daftar_harga.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Berat (Kilogram)</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($daftar_harga as $harga)
                            <tr>
                                <td>{{ $harga->nama_barang }}</td>
                                <td>{{ $harga->kilogram }}</td>
                                <td>{{ $harga->harga }}</td>
                                <td>
                                    <a href="{{ route('daftar_harga.show', $harga->id) }}"
                                        class="btn btn-primary btn-sm m-1"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('daftar_harga.edit', $harga->id) }}"
                                        class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('daftar_harga.destroy', $harga->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-1"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
