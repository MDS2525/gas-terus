@extends('layout.app')
@section('title', 'Outlet Tambah')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Outlet</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('outlet.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama_outlet">Nama Outlet</label>
                            <input type="text" name="nama_outlet" id="nama_outlet" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp_outlet">No Telp Outlet</label>
                            <input type="number" name="telp_outlet" id="telp_outlet" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_outlet">Alamat Outlet</label>
                            <input type="text" name="alamat_outlet" id="alamat_outlet" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
