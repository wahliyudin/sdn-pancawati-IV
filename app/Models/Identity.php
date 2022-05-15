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
}
