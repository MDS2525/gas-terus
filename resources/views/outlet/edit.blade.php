@extends('layout.app')

@section('title', 'Edit Outlet')

@section('content')

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Outlet</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('daftar_harga.update', $outlet->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_outlet">Nama Outlet</label>
                    <input type="text" name="nama_outlet" id="nama_outlet" class="form-control"
                        value="{{ $outlet->nama_outlet }}" required>
                </div>
                <div class="form-group">
                    <label for="telp_outlet">No Telp Outlet</label>
                    <input type="text" name="telp_outlet" id="telp_outlet" class="form-control"
                        value="{{ $outlet->telp_outlet }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat_outlet">Alamat Outlet</label>
                    <input type="text" name="alamat_outlet" id="alamat_outlet" class="form-control"
                        value="{{ $outlet->alamat_outlet }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
