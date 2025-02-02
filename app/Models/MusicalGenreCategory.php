<?php

namespace App\Models;

// use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MusicalGenreCategory extends Model
{
    protected $table = 'musical_genres_categories';
    protected $guarded = [];


    public function musicalGenre()
    {
        return $this -> hasOne(MusicalGenre::class);
    }

    protected function categoriaMusical(): Attribute
    {
        return new Attribute(
            set: fn($category) => strtolower($category), // Almacena en minúsculas
            get: fn($category) => ucfirst($category)    // Retorna con la primera letra en mayúscula
        );
    }

}
