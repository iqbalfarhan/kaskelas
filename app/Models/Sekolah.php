<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'logo',
    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : url('/noimage.jpg');
    }

    public function kelases()
    {
        return $this->hasMany(Kelas::class);
    }
}
