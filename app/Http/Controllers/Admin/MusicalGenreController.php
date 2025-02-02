<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MusicalGenre;
use App\Models\MusicalGenreCategory;
use App\Models\MusicalGenregenre;
use Illuminate\Http\Request;

class MusicalGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = MusicalGenre::with('musicalCategory')
                                ->orderBy('genero', 'asc')
                                ->paginate(perPage: 10, pageName: 'musicGenrePage');

        $categories = MusicalGenreCategory::select('id', 'categoria_musical')
                                            -> orderBy('categoria_musical')
                                            -> get();

        return view('admin.music.genres.index', compact('genres', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = MusicalGenreCategory::orderBy('categoria_musical') -> get();

        return view('admin.music.genres.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'genre' => 'required|unique:musical_genres,genero|string|max:40|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'category_id' => 'required|exists:musical_genres_categories,id|integer'
        ], [
            'genre.required' => 'El nombre del género es obligatorio',
            'genre.unique' => 'Este género musical ya está registrado',
            'genre.max' => 'El nombre del género es demasiado largo',
            'genre.regex' => 'El nombre del género no puede contener números',

            'category_id.required' => 'El género debe estar vinculado a una categoría musical',
            'category_id.exists' => 'La categoría seleccionada no es válida',
        ], [
            'genre' => 'género',
            'category_id' => 'categoría musical'
        ]);

        $genre = MusicalGenre::create([
            'genero' => $data['genre'],
            'idCategoriaMusical' => $data['category_id'],
        ]);

        if (!$genre) return view('admin.music.genres.create');

        return redirect() -> route('admin.music-genre.create') -> with('swal', [
            'title' => '¡Género agregado con éxito!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = MusicalGenre::find($id);

        if($genre -> delete())
            return redirect() -> route('admin.music-genre.index') -> with('swal', '¡Género eliminado con éxito!');
        else
            return redirect() -> route('admin.music-genre.index') -> with('swal', '¡Ocurrió un error!');
    }
}
