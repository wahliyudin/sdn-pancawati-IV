<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ref\Region;
use Illuminate\Http\Request;

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
}
