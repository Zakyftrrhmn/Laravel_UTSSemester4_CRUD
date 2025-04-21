<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'user_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo("App\Models\Buku", 'buku_id', 'id');
    }
}
