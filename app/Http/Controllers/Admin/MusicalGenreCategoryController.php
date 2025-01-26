<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MusicalGenreCategory;
use Illuminate\Http\Request;

class MusicalGenreCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MusicalGenreCategory::orderBy('categoria', 'asc') -> get();

        return view('admin.music.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.music.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'category' => 'required|unique:musical_genres_categories,categoria_musical|string|max:30'
        ], [
            'category.required' => 'El nombre de la categoría es obligatorio',
            'category.unique' => 'Esta categoría musical ya está registrada',
            'category.max' => 'El nombre de la categoría es demasiado largo',
        ], [
            'category' => 'categoría'
        ]);

        $category = MusicalGenreCategory::create([
            'categoria_musical' => $data['category']
        ]);

        if (!$category) return view('admin.music.categories.create');

        $categories = MusicalGenreCategory::orderBy('categoria_musical', 'asc') -> get();
        return view('admin.music.genres.create', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
