<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'email',
        'no_hp'
    ];
}
