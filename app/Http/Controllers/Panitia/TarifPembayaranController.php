<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\TypeOfPayment;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TarifPembayaranController extends Controller
{
    public function index()
    {
        return view('panitia.tarif-pembayaran.index', [
            'breadcrumb' => [
                'title' => 'Tarif Pembayaran',
                'path' => [
                    'Tarif Pembayaran' => 0
                ]
            ],
            'type_of_payments' => TypeOfPayment::latest()->get()
        ]);
    }

    public function byTipe($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            return view('panitia.tarif-pembayaran.by-tipe', [
                'breadcrumb' => [
                    'title' => 'Tagihan Pembayaran',
                    'path' => [
                        'Tarif Pemabayaran' => route('panitia.tarif-pembayaran.index'),
                        'Tagihan Pembayaran' => 0
                    ]
                ],
                'type_of_payment' => TypeOfPayment::with('payments')->findOrFail($decrypted),
                'students' => User::latest()->get()
            ]);
        } catch (DecryptException $e) {
            return redirect()->with('error', $e->getMessage());
        }
    }

    public function billingSame(Request $request, $type_of_payment_id)
    {
        try {
            foreach (User::get() as $user) {
                if (!Payment::where('user_id', $user->id)->where('type_of_payment_id', $type_of_payment_id)->first()) {
                    Payment::create([
                        'user_id' => $user->id,
                        'type_of_payment_id' => $type_of_payment_id,
                        'billing' => replaceRupiah($request->billing),
                        'total_payment' => 0
                    ]);
                }
            }
            return back()->with('success', 'Data Berhasil disimpan');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function billingPerStudent(Request $request, $type_of_payment_id)
    {
        try {
            if (!Payment::where('user_id', $request->student_id)->where('type_of_payment_id', $type_of_payment_id)->first()) {
                Payment::create([
                    'user_id' => $request->student_id,
                    'type_of_payment_id' => $type_of_payment_id,
                    'billing' => replaceRupiah($request->billing),
                    'total_payment' => 0
                ]);
            } else {
                return back()->with('warning', 'Data sudh ada');
            }
            return back()->with('success', 'Data Berhasil disimpan');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
