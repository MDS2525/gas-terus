<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_address' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'delivery_date' => 'required|date',
            'pickup_date' => 'nullable|date',
            'status' => 'required|in:not_picked_up,picked_up',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'customer_name' => 'required',
            'customer_address' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'phone_number' => 'required',
            'delivery_date' => 'required',
            'pickup_date' => 'required',
            'status' => 'required',
        ]);


        $transaction->customer_name = $request->customer_name;
        $transaction->customer_address = $request->customer_address;
        $transaction->nama_barang = $request->nama_barang;
        $transaction->harga = $request->harga;
        $transaction->phone_number = $request->phone_number;
        $transaction->delivery_date = $request->delivery_date;
        $transaction->pickup_date = $request->pickup_date;
        $transaction->status = $request->status;

        $transaction->save();
        return redirect()->route('transactions')->with('message', 'Data Transaksi berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions')->with('message', 'Data Transaksi berhasil dihapus');
    }
}
