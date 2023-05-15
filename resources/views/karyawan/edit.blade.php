@extends('layout.app')
@section('title', 'Edit Karyawan')
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Karyawan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('karyawan.update', $karyawan->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $karyawan->email }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{ $karyawan->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="{{ $karyawan->no_telp }}">
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
