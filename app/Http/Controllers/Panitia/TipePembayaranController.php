<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\TypeOfPayment;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TipePembayaranController extends Controller
{
    public function index()
    {
        return view('panitia.tipe-pembayaran.index', [
            'breadcrumb' => [
                'title' => 'Tipe Pembayaran',
                'path' => [
                    'Tipe Pembayaran' => 0
                ]
            ],
            'type_of_payments' => TypeOfPayment::latest()->get()
        ]);
    }

    public function create()
    {
        return view('panitia.tipe-pembayaran.create', [
            'breadcrumb' => [
                'title' => 'Tambah Tipe Pembayaran',
                'path' => [
                    'Tipe Pembayaran' => route('panitia.tipe-pembayaran.index'),
                    'Tambah Tipe Pembayaran' => 0
                ]
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        TypeOfPayment::create($validated);

        return redirect()->route('panitia.tipe-pembayaran.index')->with('success', 'Data Berhasil ditembahkan');
    }

    public function edit($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            return view('panitia.tipe-pembayaran.edit', [
                'breadcrumb' => [
                    'title' => 'Edit Tipe Pembayaran',
                    'path' => [
                        'Tipe Pembayaran' => route('panitia.tipe-pembayaran.index'),
                        'Edit Tipe Pembayaran' => 0
                    ]
                ],
                'type_of_payment' => TypeOfPayment::findOrFail($decrypted)
            ]);
        } catch (DecryptException $th) {
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            TypeOfPayment::findOrFail($decrypted)->update($request->all());
            return redirect()->route('panitia.tipe-pembayaran.index')->with('success', 'Data Berhasil diubah');
        } catch (DecryptException $th) {
        }
    }

    public function destroy($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            TypeOfPayment::findOrFail($decrypted)->delete();
            return redirect()->route('panitia.tipe-pembayaran.index')->with('success', 'Data Berhasil dihapus');
        } catch (DecryptException $th) {
        }
    }
}
