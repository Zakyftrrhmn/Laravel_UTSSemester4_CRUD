<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'user_id', 'id');
    }

    public function ulasan()
    {
        return $this->hasMany("App\Models\Ulasan", 'buku_id');
    }

    public function peminjaman()
    {
        return $this->hasMany("App\Models\Peminjaman", 'buku_id');
    }
}
