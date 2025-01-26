<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicalGenre extends Model
{
    protected $table = 'musical_genres';
    protected $guarded = [];

    public function musicalCategory()
    {
        return $this -> hasOne(MusicalGenreCategory::class);
    }

    protected function

}
