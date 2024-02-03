<?php

namespace App\Models;

use App\Models\Cafe;
use App\Models\Beli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Minum extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cafe()
    {
        return $this->hasMany(Cafe::class);
    }

    public function beli()
    {
        return $this->hasMany(Beli::class);
    }

    public function scopeFilter($query)
    {
        $query->where('cafe_id', auth()->user()->cafe->id);
    }

    public function scopeCari($query, $cari)
    {
        $query->where('nama_minuman', 'like', '%' . $cari . '%');
    }

    public function favoriteDrinks()
    {
        // Ambil semua data yang ada di tabel beli
        $beli = Beli::all();

        // Hitung jumlah minuman yang dibeli
        $sortMinum = $beli->countBy('minum_id');

        // Urutkan minuman yang paling banyak dibeli
        $minum = $sortMinum->sortDesc();

        // Ambil 3 minuman yang paling
        $minum = $minum->take(3);

        return $minum;
    }
}
