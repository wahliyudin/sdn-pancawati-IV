<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('panitia.pembayaran.index', [
            'breadcrumb' => [
                'title' => 'Pembayaran',
                'path' => [
                    'Pembayaran' => 0
                ]
            ],
        ]);
    }
}
