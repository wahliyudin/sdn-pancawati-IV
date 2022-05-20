<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

if (!function_exists("generateNoPeserta")) {
    function generateNoPeserta()
    {
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        if (User::count() === 0) {
            $no_peserta = $thnBulan . 100001;
        } else {
            $user = User::all()->last();
            $noUrut = (int) substr($user->no_peserta, -6) + 1;
            $no_peserta = $thnBulan . $noUrut;
        }
        return $no_peserta;
    }
}

if (!function_exists('replaceRupiah')) {
    function replaceRupiah(string $rupiah)
    {
        $rupiah = Str::replace('Rp. ', '', $rupiah);
        return (int) Str::replace('.', '', $rupiah);
    }
}

if (!function_exists('numberFormat')) {
    function numberFormat($number)
    {
        return number_format($number, 0, ',', '.');
    }
}

if (!function_exists('generatePaymentNumber')) {
    function generatePaymentNumber($model, string $prefix, string $property): string
    {
        if ($model instanceof Model) {
            $thnBulan = Carbon::now()->year . Carbon::now()->month;
            if ($model::count() === 0) {
                return $prefix . $thnBulan . '10000001';
            } else {
                return $prefix . $thnBulan . (int) substr($model::get()->last()->$property, -8) + 1;
            }
        }
        return null;
    }
}
