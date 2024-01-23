<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Chapter;
use App\Models\Genre;

class Novel extends Model
{
    use HasFactory;

    public function latestChapter()
    {
        return $this->hasOne(Chapter::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'novel_genres', 'novelId', 'genreId');
    }
}
