<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ref\Region;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BaseController extends Controller
{
    function getRegency($id_provinsi)
    {
        return Region::get_regency($id_provinsi);
    }

    function getDistrict($id_kota)
    {
        return Region::get_district($id_kota);
    }

    function getVillage($id_kecamatan)
    {
        return Region::get_village($id_kecamatan);
    }

    public function siswa($id_tipe, $id)
    {
        // return response()->json([
        //     'id_tipe' => $id_tipe,
        //     'id' => $id
        // ]);
        return response()->json(User::with('payments')->findOrFail($id)->payments->where('type_of_payment_id', $id_tipe)->first());
    }
}
