<?php

namespace App\Models;

use App\Models\Vip;
use App\Models\Cafe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Sope Filter
    public function scopeFilter($query)
    {
        $query->where('user_id', auth()->user()->id);
    }

    public function scopeBooking($query)
    {
        $query->where('cafe_id', auth()->user()->cafe->id);
    }

    public function scopeTunggu($query)
    {
        $query->where('opsi', 'tunggu');
    }

    public function scopeSukses($query)
    {
        $query->where('opsi', 'sukses');
    }

    public function scopeSelesai($query)
    {
        $query->where('opsi', 'selesai');
    }

    public function scopeTanggal($query, $filters)
    {
        $query->where('created_at', 'like', '%' . $filters . '%');
    }

    public function scopeFiltertanggal($query,Array $filters){

        $query->when($filters['dari'] ?? false, function($query, $dari){
            return $query->where('updated_at', ">=" , $dari);
        });

        $query->when($filters['sampai'] ?? false, function($query, $sampai){
            return $query->where('updated_at', "<=" , date('Y-m-d', strtotime('+1 days', strtotime($sampai))));
        });


    }

    // Relasi

    public function vip()
    {
        return $this->belongsTo(Vip::class);
    }

    public function cafe()
    {
        return $this->belongsTo(Cafe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCari($query, $cari)
    {
        $query->where('no_pesanan', 'like', '%' . $cari . '%');
    }
}
