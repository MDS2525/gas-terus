@extends('layout.app')

@section('title', 'Edit Transaksi')

@section('content')

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Transaksi</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="customer_name">Nama Pelanggan</label>
                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                        value="{{ $transaction->customer_name }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_address">Alamat Pelanggan</label>
                    <input type="text" name="customer_address" id="customer_address" class="form-control"
                        value="{{ $transaction->customer_address }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                        value="{{ $transaction->nama_barang }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control"
                        value="{{ $transaction->harga }}" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="tel" name="phone_number" id="phone_number" class="form-control"
                        value="{{ $transaction->phone_number }}" required>
                </div>
                <div class="form-group">
                    <label for="delivery_date">Hari Penyerahan Barang</label>
                    <input type="date" name="delivery_date" id="delivery_date" class="form-control"
                        value="{{ $transaction->delivery_date }}" required>
                </div>
                <div class="form-group">
                    <label for="pickup_date">Hari Pengambilan Barang</label>
                    <input type="date" name="pickup_date" id="pickup_date" class="form-control"
                        value="{{ $transaction->pickup_date }}">
                </div>
                <div class="form-group">
                    <label for="status">Status Barang</label>
                    <select name="status" id="status" class="form-control">
                        @php
                            $statuses = ['not_picked_up' => 'Belum Diambil', 'picked_up' => 'Sudah Diambil'];
                        @endphp
                        @foreach ($statuses as $value => $label)
                            <option value="{{ $value }}" {{ $transaction->status == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
