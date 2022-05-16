<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'father_id',
        'mother_id',
        'alamat'
    ];
}
