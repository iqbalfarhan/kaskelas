<?php

namespace App\Models;

use App\Casts\Bulan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'user_id',
        'tipe',
        'kategori',
        'bulan',
        'nominal',
        'keterangan',
    ];

    protected $casts = [
        'bulan' => Bulan::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
