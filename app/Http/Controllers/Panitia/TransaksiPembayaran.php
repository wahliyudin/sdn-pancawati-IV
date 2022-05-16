<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
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
        ]);
    }
}
