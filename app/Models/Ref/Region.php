<?php

namespace App\Models\Ref;


class Region
{
    static function get_provinces()
    {
        $provinces = Province::get();
        if (count($provinces)) return $provinces;

        $province_lists = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provinces = json_decode($province_lists, 1)['provinsi'];
        $province_lists = json_decode($province_lists);
        Province::insert($provinces);
        return $province_lists->provinsi;
    }

    static function get_regency($id_provinsi)
    {
        $regencies = Regency::where('id_provinsi', $id_provinsi)->get();
        if (count($regencies)) return $regencies;

        $regency_lists = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id_provinsi);
        $regencies = json_decode($regency_lists, 1)['kota_kabupaten'];
        $regency_lists = json_decode($regency_lists);
        Regency::insert($regencies);
        return $regency_lists->kota_kabupaten;
    }

    static function get_district($id_kota)
    {
        $data = District::where('id_kota', $id_kota)->get();
        if (count($data)) return $data;

        $list_data = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $id_kota);
        $data = json_decode($list_data, 1)['kecamatan'];
        $list_data = json_decode($list_data);
        District::insert($data);
        return $list_data->kecamatan;
    }

    static function get_village($id_kecamatan)
    {
        $data = Village::where('id_kecamatan', $id_kecamatan)->get();
        if (count($data)) return $data;

        $list_data = file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $id_kecamatan);
        $data = json_decode($list_data, 1)['kelurahan'];
        $list_data = json_decode($list_data);
        Village::insert($data);
        return $list_data->kelurahan;
    }
}
