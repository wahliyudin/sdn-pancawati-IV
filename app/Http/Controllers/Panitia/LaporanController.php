<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use App\Models\CashIn;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('panitia.laporan.index', [
            'breadcrumb' => [
                'title' => 'Laporan',
                'path' => [
                    'Laporan' => 0
                ]
            ]
        ]);
    }

    public function export(Request $request)
    {
        $first_date = $request->first_date ? Carbon::make($request->first_date)->format('Y-m-d') :
            now()->format('Y-m-d');
        $last_date = $request->last_date ? Carbon::make($request->last_date)->format('Y-m-d') : now()->format('Y-m-d');
        $cash_ins = CashIn::with('account')->whereBetween('tanggal', [$first_date, $last_date])->get();
        $pdf = Pdf::loadView('exports.laporan', compact('cash_ins', 'first_date', 'last_date'));
        return $pdf->setPaper('A4')->stream();
    }
}
