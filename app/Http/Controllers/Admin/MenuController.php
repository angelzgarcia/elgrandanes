<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menuExists = Menu::exists();
        if ($menuExists) return redirect() -> route('dashboard');

        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'menu' => 'required|file|mimes:pdf|max:51200'
        ]);

        $file = basename($request->file('menu')->storeAs('files', $request->file('menu')->getClientOriginalName(), 'public'));
        // $ruta = $file -> store('files','public');

        Menu::truncate();

        $menu = Menu::create([
            'nombre_original' => $file,
            // 'ruta' => $ruta,
        ]);

        return redirect() -> route('menu.show', $menu);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menuExists = Menu::exists();
        if (!$menuExists) return redirect() -> route('dashboard');

        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menuExists = Menu::exists();
        if (!$menuExists) return redirect() -> route('dashboard');

        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menuExists = Menu::exists();
        if (!$menuExists) return redirect() -> route('dashboard');

        $request -> validate([
            'menu' => 'required|file|mimes:pdf|max:51200'
        ]);

        $file = basename($request->file('menu')->storeAs('files', $request->file('menu')->getClientOriginalName(), 'public'));


        $menu -> update([
            'nombre_original' => $file,
        ]);

        return redirect() -> route('menu.show', compact(var_name: 'menu'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu -> delete();

        return redirect() -> route('dashboard');
    }
}
