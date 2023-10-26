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
        'telegram_group_id',
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

    public function belumBayar($bulan = null)
    {
        $bulan = $bulan ?: date('Y-m');
        $user_ids = $this->transaksi->where('bulan', $bulan)->pluck('user_id');
        return $this->users->whereNotIn('id', $user_ids)->pluck('name') ?? ["tidak ada"];
    }

    public function sudahBayar($bulan = null)
    {
        $bulan = $bulan ?: date('Y-m');
        $user_ids = $this->transaksi->where('bulan', $bulan)->pluck('user_id');
        return $this->users->whereIn('id', $user_ids)->pluck('name') ?? ["tidak ada"];
    }
}
