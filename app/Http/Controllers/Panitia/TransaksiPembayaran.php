<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\ItemPayment;
use App\Models\TypeOfPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiPembayaran extends Controller
{
    public function index()
    {
        return view('panitia.transaksi-pembayaran.index', [
            'breadcrumb' => [
                'title' => 'Transaksi',
                'path' => [
                    'Transaksi' => 0
                ]
            ],
            'students' => User::with('identity', 'payments')->where('status_kelulusan', User::STATUS_LULUS)->get()
        ]);
    }

    public function create()
    {
        return view('panitia.transaksi-pembayaran.create', [
            'breadcrumb' => [
                'title' => 'Tambah Transaksi',
                'path' => [
                    'Transaksi Pembayaran' => route('panitia.transaksi-pembayaran'),
                    'Tambah Transaksi' => 0
                ]
            ],
            'students' => User::with('identity', 'payments')->where('status_kelulusan', User::STATUS_LULUS)->get(),
            'payment_number' => generatePaymentNumber(new ItemPayment(), 'NC', 'payment_number'),
            'type_of_payments' => TypeOfPayment::latest()->get()
        ]);
    }

    public function payment(Request $request)
    {
        $request->validate([
            'payment_number' => 'required',
            'payment' => 'required',
            'description' => 'required',
            'tanggal' => 'required'
        ]);
        $data = $request->all();

        $data['billing'] = replaceRupiah($data['billing']);
        $data['payment'] = replaceRupiah($data['payment']);
        $data['change'] = replaceRupiah($data['change']);
        $data['tanggal'] = Carbon::parse($data['tanggal'])->format('Y-m-d');
        if ($data['change'] != 0) {
            $data['payment'] = $data['payment'] - $data['change'];
        }
        $payment = User::findOrFail($data['student_id'])->payments->where(
            'type_of_payment_id',
            $data['type_of_payment_id']
        )->first();
        $isLunas = $payment->total_payment + $data['payment'] == $payment->billing;
        $payment->update([
            'total_payment' => $payment->total_payment + $data['payment'],
            'status' => $isLunas
        ]);
        ItemPayment::create([
            'payment_id' => $payment->id,
            'panitia_id' => auth()->user()->id,
            'payment_number' => generatePaymentNumber(new ItemPayment(), 'PN', 'payment_number'),
            'billing' => $data['payment'],
            'change' => $data['change'],
            'description' => $data['description'],
            'tanggal' => $data['tanggal']
        ]);
        return back()->with('success', 'Data berhasil disimpan');
    }
}
