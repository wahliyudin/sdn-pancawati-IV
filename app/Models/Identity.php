<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nisn',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'anak_ke',
        'jumlah_saudara',
        'suku',
        'kewarganegaraan',
        'bahasa',
        'asal_sekolah',
        'no_ijazah',
        'tanggal_ijazah',
        'gol_darah',
        'berat_badan',
        'tinggi_badan',
        'riwayat_penyakit',
        'pas_foto_url'
    ];

    static function rules()
    {
        return [
            'user_id' => 'required',
            'nama' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara' => 'required',
            'suku' => 'required',
            'kewarganegaraan' => 'required',
            'bahasa' => 'required',
            'asal_sekolah' => 'required',
            'no_ijazah' => 'required',
            'tanggal_ijazah' => 'required',
            'gol_darah' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'riwayat_penyakit' => 'required',
            'pas_foto_url' => ['required', 'file', 'max:300', 'mimes:jpg,jpeg'],
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa_kel' => 'required',
            'kode_pos' => 'required',
        ];
    }
}
