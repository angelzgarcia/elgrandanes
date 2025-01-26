<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MusicalGenre;
use App\Models\MusicalGenreCategory;
use Illuminate\Http\Request;

class MusicalGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = MusicalGenre::orderBy('genero', 'asc')
                                -> paginate(perPage: 10, pageName: 'musicGenrePage');

        $categories = MusicalGenreCategory::orderBy('categoria_musical') -> get();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
