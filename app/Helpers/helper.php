<?php

use App\Models\User;
use Carbon\Carbon;

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
