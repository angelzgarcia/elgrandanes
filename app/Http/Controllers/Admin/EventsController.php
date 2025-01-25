<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')
                        -> paginate(perPage:8);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $horario = "{$request->start_event} - {$request->end_event}";
        $sameEvent = Event::where('fecha', $request->date)
                        -> where('horario', $horario)
                        -> first();

        if ($sameEvent) return back() -> withErrors(['start_event' => 'Ya existe un evento con la misma fecha y horario.']) -> withInput();

        $slugBase = Str::slug($request->date . ' ' . $horario);
        $slug = $slugBase;
        $count = 1;

        while (Event::where('slug', $slug)->exists()) $slug = $slugBase . '-' . $count++;

        $file = $request -> file('image_event');
        $event = Event::create([
            'fecha' => $request -> date,
            'horario' => $horario,
            'slug' => $slug,
            'costo_preventa' => $request -> pre_sale_cost ?? 0,
            'costo_taquilla' => $request -> ticket_cost ?? 0,
            'genero' => $request -> musical_genre,
            'facebook' => $request -> fb,
            'instagram' => $request -> instagram,
            'youtube' => $request -> youtube,
            'reservacion' => $request -> reservation === 'si' ? true : false,
            'cupos' => $request -> quotas,
            'tipo_evento' => $request -> event_type,
            'imagen' =>
                basename($file -> storeAs('imgs/uploads/events',   time() . '-' . $file -> getClientOriginalName(), 'public')),
        ]);

        if (!$event) return back()->withErrors(['error' => 'No se pudo crear el evento']);

        return redirect() -> route('admin.events.show', compact('event')) -> with('success', '¡Evento creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
