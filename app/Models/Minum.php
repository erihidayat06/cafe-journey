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
        $this->hasMany(Cafe::class);
    }

    public function beli()
    {
        $this->hasMany(Beli::class);
    }

    public function scopeFilter($query)
    {
        $query->where('cafe_id', auth()->user()->cafe->id);
    }

    public function scopeCari($query, $cari)
    {
        $query->where('nama_minuman', 'like', '%' . $cari . '%');
    }
}
