<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $talbe = 'events';

    // protected $fillable = [
    //     'fecha',
    //     'horario',
    //     'costo_preventa',
    //     'costo_taquilla',
    //     'genero',
    //     'facebook',
    //     'instagram',
    //     'youtube',
    //     'reservacion',
    //     'cupos',
    //     'imagen',
    // ];
    protected $guarded = [''];

    public static function boot()
    {
        parent::boot();

        static::creating(function($event) {
            $event->slug = Str::slug($event->fecha . ' ' . $event->horario);
        });
    }

}
