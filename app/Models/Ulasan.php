<?php

namespace App\Models;

use App\Models\Cafe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cafe()
    {
        return $this->hasMany(Cafe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
