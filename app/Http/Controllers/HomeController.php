<?php

namespace App\Http\Controllers;

use App\Models\ItemPayment;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PDF;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('pendaftaran');
    }

    public function home()
    {
        return view('user.home');
    }

    public function trimakasih()
    {
        return view('trimakasih');
    }

    public function exportBuktiPembayaranPertransaksi($student_id, $item_peyment_id)
    {
        try {
            $student_id = Crypt::decrypt($student_id);
            $item_peyment_id = Crypt::decrypt($item_peyment_id);
        } catch (DecryptException $e) {
        }
        $student = User::with('identity')->findOrFail($student_id);
        $item_payment = ItemPayment::findOrFail($item_peyment_id);
        $pdf = PDF::loadView('exports.bukti-pembayaran-pertransaksi', compact('item_payment', 'student'));

        return $pdf->setPaper('A4')->stream();
    }

    public function exportBuktiPembayaran($student_id, $type_of_payment_id, $name_type_of_payment)
    {
        try {
            $student_id = Crypt::decrypt($student_id);
            $type_of_payment_id = Crypt::decrypt($type_of_payment_id);
            $name_type_of_payment = Crypt::decrypt($name_type_of_payment);
        } catch (DecryptException $e) {
        }
        $student = User::with('identity', 'payments')->findOrFail($student_id);
        $item_payments = $student->payments->where('type_of_payment_id', $type_of_payment_id)->first()->itemPayments;
        $pdf = PDF::loadView('exports.bukti-pembayaran', compact('item_payments', 'student',
        'name_type_of_payment'));

        return $pdf->setPaper('A4')->stream();
    }
}
