<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'panitia_id',
        'payment_number',
        'billing',
        'description',
        'tanggal'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function panitia()
    {
        return $this->belongsTo(Panitia::class);
    }
}
