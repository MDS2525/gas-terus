@extends('layout.app')
@section('title', 'Detail Karyawan')
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Karyawan</h1>

    <!-- Detail Karyawan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $karyawan->nama }}</h5>
            <p class="card-text">Email: {{ $karyawan->email }}</p>
            <p class="card-text">Alamat: {{ $karyawan->alamat }}</p>
            <p class="card-text">No Telp: {{ $karyawan->no_telp }}</p>
            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                Edit</a>
            <form action="{{ route('karyawan.delete', $karyawan->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i>
                    Hapus</button>
            </form>
        </div>
    </div>

@endsection
