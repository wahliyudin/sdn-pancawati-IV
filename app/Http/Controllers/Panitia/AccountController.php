<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AccountController extends Controller
{
    public function index()
    {
        return view('panitia.account.index', [
            'breadcrumb' => [
                'title' => 'Data Rekening',
                'path' => [
                    'Data Rekening' => 0
                ]
            ],
            'accounts' => Account::latest()->get()
        ]);
    }

    public function create()
    {
        return view('panitia.account.create', [
            'breadcrumb' => [
                'title' => 'Tambah Data Rekening',
                'path' => [
                    'Data Rekening' => route('panitia.account.index'),
                    'Tambah Data Rekening' => 0
                ]
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        Account::create($validated);

        return redirect()->route('panitia.account.index')->with('success', 'Data Berhasil ditembahkan');
    }

    public function edit($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            return view('panitia.account.edit', [
                'breadcrumb' => [
                    'title' => 'Edit Data Rekening',
                    'path' => [
                        'Data Rekening' => route('panitia.account.index'),
                        'Edit Data Rekening' => 0
                    ]
                ],
                'account' => Account::findOrFail($decrypted)
            ]);
        } catch (DecryptException $th) {
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            Account::findOrFail($decrypted)->update($request->all());
            return redirect()->route('panitia.account.index')->with('success', 'Data Berhasil diubah');
        } catch (DecryptException $th) {
        }
    }

    public function destroy($id)
    {
        try {
            $decrypted = Crypt::decrypt($id);
            Account::findOrFail($decrypted)->delete();
            return redirect()->route('panitia.account.index')->with('success', 'Data Berhasil dihapus');
        } catch (DecryptException $th) {
        }
    }
}
