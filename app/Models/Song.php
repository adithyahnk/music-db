<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function songRating()
    {
        return $this->hasMany(Rating::class, 'song_id', 'id');
    }

}
