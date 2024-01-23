<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Novel;

class Genre extends Model
{
    use HasFactory;

    public function novels()
    {
        return $this->belongsToMany(Novel::class, 'novel_genres', 'genreId', 'novelId');
    }
}
