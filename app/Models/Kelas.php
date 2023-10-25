<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'angkatan',
        'walikelas',
    ];

    public function getSaldoAttribute()
    {
        $masuk = $this->transaksi->where('tipe', 'masuk')->sum('nominal');
        $keluar = $this->transaksi->where('tipe', 'keluar')->sum('nominal');

        return $masuk - $keluar;
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
