<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'nis',
        'kelas_id',
        'sekolah_id',
        'password',
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
        'password' => 'hashed',
    ];

    public function getImageAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : 'https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg';
    }

    public function getInitialAttribute()
    {
        $words = explode(' ', $this->name);

        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }
        return substr($initials, 0, 2);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function getSekolahAttribute()
    {
        return $this->kelas_id ? $this->kelas->sekolah : null;
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
