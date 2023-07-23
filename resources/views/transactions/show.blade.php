@extends('layout.app')

@section('title', 'Detail Transaksi')

@section('content')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
        </div>
        @php
            $statuses = ['not_picked_up' => 'Belum Diambil', 'picked_up' => 'Sudah Diambil'];
        @endphp
        <div class="card-body">
            <p><strong>Nama Pelanggan:</strong> {{ $transaction->customer_name }}</p>
            <p><strong>Alamat Pelanggan:</strong> {{ $transaction->customer_address }}</p>
            <p><strong>Nama Barang:</strong> {{ $transaction->nama_barang }}</p>
            <p><strong>Harga:</strong> {{ $transaction->harga }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $transaction->phone_number }}</p>
            <p><strong>Hari Penyerahan Barang:</strong>
                {{ \Carbon\Carbon::parse($transaction->delivery_date)->format('d-m-Y') }}</p>
            <p><strong>Hari Pengambilan Barang:</strong>
                {{ \Carbon\Carbon::parse($transaction->pickup_date)->format('d-m-Y') }}</p>
            <p><strong>Status Barang:</strong>
                <td>{{ $statuses[$transaction->status] }}</td>
            </p>

            <div class="mt-3">
                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
