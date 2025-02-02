<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $talbe = 'events';
    protected $guarded = [''];

    public static function boot()
    {
        parent::boot();

        static::creating(function($event) {
            $event->slug = Str::slug($event->fecha . ' ' . $event->horario);
        });
    }

    public function musicalGenre()
    {
        return $this -> hasOne(MusicalGenre::class, 'id', 'idGeneroMusical');
    }

}
