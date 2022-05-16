<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Panitia extends Authenticatable
{
    use HasFactory, Notifiable;

    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    protected $perPage = 20;

    protected $table = 'panitia';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) $this->attributes['password'] = bcrypt($value);
    }
}
