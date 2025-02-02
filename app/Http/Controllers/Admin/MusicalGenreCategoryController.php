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
        $categories = MusicalGenreCategory::select('id', 'categoria_musical', 'created_at')
                                            -> orderBy('categoria_musical', 'asc')
                                            -> get();

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
            'category' => 'required|unique:musical_genres_categories,categoria_musical|string|max:40|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
        ], [
            'category.required' => 'El nombre de la categoría es obligatorio',
            'category.unique' => 'Esta categoría musical ya está registrada',
            'category.max' => 'El nombre de la categoría es demasiado largo',
            'category.regex' => 'El nombre de la categoría no puede contener números'
        ], [
            'category' => 'categoría'
        ]);

        $category = MusicalGenreCategory::create([
            'categoria_musical' => $data['category']
        ]);

        if (!$category) return view('admin.music.categories.create');

        return redirect() -> route('admin.music-category.create') -> with('swal', [
            'title' => '¡Categoría creada con éxito!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = MusicalGenreCategory::find($id);

        if($category -> delete())
            return redirect() -> route('admin.music-category.index') -> with('swal', '¡Categoría eliminada con éxito!');
        else
            return redirect() -> route('admin.music-category.index') -> with('swal', '¡Ocurrió un error!');
    }
}
