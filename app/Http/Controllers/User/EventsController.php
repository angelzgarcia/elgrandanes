<?php

namespace App\Http\Controllers\User;

use App;
use App\Http\Controllers\Controller;
use App\Models\Event;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use IntlDateFormatter;

class EventsController extends Controller
{
    public function upcomingEventsIndex()
    {
        $events = Event::select('fecha', 'horario', 'imagen', 'tipo_evento', 'slug')
                        -> orderBy('fecha', 'asc') -> get();

        if ($events->isEmpty()) return view('users.events.upcomingIndex');

        foreach ($events as $event)
            $this->formatDate($event);

        $currentEvent = $events->first();
        $this->formatHorary($currentEvent);

        return view('users.events.upcomingIndex', compact('events', 'currentEvent'));
    }

    public function previousEventsIndex()
    {
        return view('users.events.previousIndex');
    }

    public function updateCurrentEvent($slug)
    {
        $currentEvent = Event::where('slug', $slug)->first();

        !$currentEvent ? abort(404, 'Evento no encontrado') : '';

        $this->formatDate($currentEvent);
        $this->formatHorary($currentEvent);

        $events = Event::orderBy('fecha', 'asc')->get();
        foreach ($events as $event)
            $this->formatDate($event);

        return view('users.events.upcomingIndex', compact('events', 'currentEvent'));
    }

    private function formatDate(Event $event)
    {
        $date = new DateTime($event->fecha, new DateTimeZone('America/Mexico_City'));

        $formatter = new IntlDateFormatter(
            'es_MX',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'America/Mexico_City',
            IntlDateFormatter::GREGORIAN,
            'EEE, d \'de\' MMM \'de\' y'
        );

        $formattedDate = $formatter->format($date);
        $formattedDate = mb_convert_case($formattedDate, MB_CASE_TITLE, "UTF-8");

        $event->fecha_formateada = str_replace(' De ', ' de ', $formattedDate);
    }

    private function formatHorary(Event $event)
    {
        $horario = explode('-', $event->horario);

        foreach ($horario as $index => $hora) {
            [$hour, $minute] = explode(':', $hora);
            $hour = intval($hour);

            if ($hour >= 12 && $hour < 24) {
                $horario[$index] .= ' p.m.';
            } else {
                $horario[$index] .= ' a.m.';
            }
        }

        $event->horario = implode(' - ', $horario);
    }

}
