<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\CashIn;
use App\Models\ItemPayment;
use App\Models\TypeOfPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    // public function edit()
    // {

    // }

    // public function update()
    // {
    //     # code...
    // }

    // public function destroy()
    // {
    //     # code...
    // }

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
            'type_of_payments' => TypeOfPayment::latest()->get(),
            'accounts' => Account::latest()->get()
        ]);
    }

    public function payment(Request $request)
    {
        $request->validate([
            'payment_number' => 'required',
            'payment' => 'required',
            'description' => 'required',
            'tanggal' => 'required',
            'billing' => 'required',
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
            'payment_number' => $data['payment_number'],
            'billing' => $data['payment'],
            'change' => $data['change'],
            'description' => $data['description'],
            'tanggal' => $data['tanggal']
        ]);
        CashIn::create([
            'account_id' => $data['account_id'],
            'no_cek' => $data['payment_number'],
            'tanggal' => $data['tanggal'],
            'keterangan' => $data['description'],
            'jumlah_bayar' => $data['payment']
        ]);
        return redirect()->route('panitia.transaksi-pembayaran')->with('success', 'Data berhasil disimpan');
    }

    public function detail($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return back()->with('error', $e->getMessage());
        }
        $student = User::with('payments')->findOrFail($decrypted);
        return view('panitia.transaksi-pembayaran.detail', [
            'breadcrumb' => [
                'title' => 'Detail Pembayaran',
                'path' => [
                    'Transaksi Pembayaran' => route('panitia.transaksi-pembayaran'),
                    'Detail Pembayaran' => 0
                ]
            ],
            'payments' => $student->payments,
            'student' => $student
        ]);
    }
}
