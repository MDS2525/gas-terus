@extends('layout.app')

@section('title', 'Daftar Outlet')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Outlet</h1>
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
            <a href="{{ route('outlet.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Nama Outlet</th>
                            <th>No Telp Outlet</th>
                            <th>Alamat Outlet</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($outlet as $outlets)
                            <tr>
                                <td>{{ $outlets->nama_outlet }}</td>
                                <td>{{ $outlets->telp_outlet }}</td>
                                <td>{{ $outlets->alamat_outlet }}</td>
                                <td>
                                    <a href="{{ route('daftar_harga.show', $outlets->id) }}"
                                        class="btn btn-primary btn-sm m-1"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('daftar_harga.edit', $outlets->id) }}"
                                        class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('outlet.destroy', $outlets->id) }}" method="POST"
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
