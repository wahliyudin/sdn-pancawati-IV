<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_LULUS = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status_verifikasi',
        'status_kelulusan',
        'no_peserta'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) $this->attributes['password'] = bcrypt($value);
    }

    public function identity()
    {
        return $this->hasOne(Identity::class);
    }

    public function userParent()
    {
        return $this->hasOne(UserParent::class);
    }


    public function getStatusVerifAttribute()
    {
        return $this->status_verifikasi == 1 ? '<span style="color: green;">Terverifikasi</span>' : '<span
            style="color: red;">Belum
        diverifikasi</span>';
    }

    public function getStatusPendaftaranAttribute()
    {
        if ($this->status_kelulusan ==  -1)
            return 'Berkas Dikembalikan';
        if ($this->status_kelulusan ==  1)
            return 'Berkas Sedang Diperiksa Panitia';
        elseif ($this->status_kelulusan == 2)
            return 'Berkas Pendaftaran Terverifikasi';
        elseif ($this->status_kelulusan == 3)
            return 'Berkas Pendaftaran tidak valid';
        elseif ($this->status_kelulusan == 4)
            return 'Selamat! Kamu dinyatakan lulus pada tahapan seleksi berkas calon peserta didik baru di SD PUPUK KUJANG CIKAMPEK.';
        elseif ($this->status_kelulusan == 5)
            return 'Maaf! kamu dinyatakan tidak lulus pada tahapan seleksi berkas calon peserta didik baru SD PUPUK
            KUJANG CIKAMPEK';
        return 'Berkas Belum dikirim';
    }

    public function getStatusLulusAttribute()
    {
        if ($this->status_kelulusan == 4)
            return '<div class="btn btn-success">Lulus</div>';
        elseif ($this->status_kelulusan == 5)
            return '<div class="btn btn-danger">Tidak Lulus</div>';
        else
            return '<div class="btn btn-secondary">Belum ada Aksi</div>';
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
