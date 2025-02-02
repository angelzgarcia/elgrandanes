<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicalGenre extends Model
{
    protected $table = 'musical_genres';
    protected $guarded = [];

    public function musicalCategory()
    {
        return $this->belongsTo(MusicalGenreCategory::class, 'idCategoriaMusical', 'id');
    }

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }


}
