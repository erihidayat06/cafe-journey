<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cafe;
use App\Models\Minum;
use App\Models\Makanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beli extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeTransaksi($query)
    {
        if (isset(auth()->user()->id)) {
            $query->where('user_id', auth()->user()->id);
        }
    }

    // Scope filter digunakan untuk menfilter berdasarkan user_id
    public function scopeFilter($query)
    {
        // Jika terdapat auth()->user()->id
        if (isset(auth()->user()->id)) {
            // di query di kecualikan dengan user_id
            $query->where('user_id', auth()->user()->id);
        }
    }

    public function scopeDashboard($query)
    {

        $query->where('cafe_id', auth()->user()->cafe->id);
    }

    public function scopeTanggal($query, $filters)
    {
        $query->where('created_at', 'like', '%' . $filters . '%');
    }

    public function scopeFiltertanggal($query, array $filters)
    {

        $query->when($filters['dari'] ?? false, function ($query, $dari) {
            return $query->where('updated_at', ">=", $dari);
        });

        $query->when($filters['sampai'] ?? false, function ($query, $sampai) {
            return $query->where('updated_at', "<=", date('Y-m-d', strtotime('+1 days', strtotime($sampai))));
        });
    }

    public function minum()
    {
        return $this->belongsTo(Minum::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }

    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
