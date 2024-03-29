<?php

namespace App\Models;

use App\Models\Vip;
use App\Models\Beli;
use App\Models\Foto;
use App\Models\User;
use App\Models\Event;
use App\Models\Minum;
use App\Models\Jadwal;
use App\Models\Ulasan;
use App\Models\Makanan;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MakananController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cafe extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi Table
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function minum()
    {
        return $this->hasMany(Minum::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function makanan()
    {
        return $this->hasMany(Makanan::class);
    }

    public function vip()
    {
        return $this->hasMany(Vip::class);
    }

    public function beli()
    {
        return $this->hasMany(Beli::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // scope
    public function scopeCafe($query)
    {
        $query->where('user_id', auth()->user()->id);
    }

    public function scopeCari($query, array $filters)
    {
        $query->when(
            $filters['cari'] ?? false,
            fn ($query, $cari) =>
            $query->where('nama_cafe', 'like', '%' . $cari . '%')
                ->orWhere('alamat', 'like', '%' . $cari . '%')
                ->orWhere('domisili', 'like', '%' . $cari . '%')
                ->orWhere('kecamatan', 'like', '%' . $cari . '%')
        );
    }

    public function sortedCafesByRating()
    {
        // Ambil Data Cafe
        $cafes = Cafe::latest()->where('konfirmasi', 'konfirmasi')->get();

        // Ambil Data Ulasans
        $ulasans = Ulasan::all();

        // Menghitung Performa cafe
        $performa = [];

        foreach ($cafes as $cafe) {
            $performa[] = [
                ($cafe->ulasan->sum('rating') + $cafe->beli->where('no_pesanan', '!==', null)->sum('jumlah')),
                $cafe->nama_cafe
            ];
        }

        // Sortir Terbesar
        arsort($performa);

        // Ambil Semua Data tanpa batasan
        $topPerformers = $performa;

        // Return Data
        return $topPerformers;
    }
}
