@extends('layout.app')
@section('title', 'transactions')
@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
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
            <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>
                Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    @php
                        $statuses = ['not_picked_up' => 'Belum Diambil', 'picked_up' => 'Sudah Diambil'];
                    @endphp

                    <thead class="text-center">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Nomor Telepon</th>
                            <th>Hari Penyerahan Barang</th>
                            <th>Hari Pengambilan Barang</th>
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->customer_name }}</td>
                                <td>{{ $transaction->customer_address }}</td>
                                <td>{{ $transaction->nama_barang }}</td>
                                <td>{{ $transaction->harga }}</td>
                                <td>{{ $transaction->phone_number }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaction->delivery_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaction->pickup_date)->format('d-m-Y') }}</td>
                                <td>{{ $statuses[$transaction->status] }}</td>
                                <td>
                                    <a href="{{ route('transactions.show', $transaction->id) }}"
                                        class="btn btn-primary btn-sm m-2"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('transactions.edit', $transaction->id) }}"
                                        class="btn btn-warning btn-sm m-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-2"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
