<?php

namespace App\Models;

use App\Models\Cafe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        $query->where('cafe_id', auth()->user()->cafe->id);
    }

    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }
}
