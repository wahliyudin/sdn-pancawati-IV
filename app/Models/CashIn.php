<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'no_cek',
        'tanggal',
        'keterangan',
        'jumlah_bayar'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
