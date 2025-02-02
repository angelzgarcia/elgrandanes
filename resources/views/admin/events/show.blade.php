

<x-layouts.admin-layout titulo="El Gran Danés Café - Bar | Evento">

    <div class="admin-event-show-container">
        {{-- <a href="{{ url() -> previous() }}">
        </a> --}}
        {{-- go back --}}
        <a href="{{ route('admin.events.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg>
        </a>

        <h2 class="font-black flex justify-center items-center relative">
            Detalles del evento
        </h2>

        <div class="admin-event-details">
            {{-- fecha --}}
            <div class="event-detail-row">
                <p>
                    fecha:
                </p>
                <p>
                    {{ $event->fecha }}
                </p>
            </div>
            <hr>
            {{-- horario --}}
            <div class="event-detail-row">
                <p>
                    horario:
                </p>
                <p>
                    {{ $event->horario }}
                </p>
            </div>
            <hr>
            {{-- preventa --}}
            <div class="event-detail-row">
                <p>
                    consto de preventa
                </p>
                <p>
                    ${{ $event->costo_preventa }}.°°
                </p>
            </div>
            <hr>
            {{-- taquilla --}}
            <div class="event-detail-row">
                <p>
                    costo de taquilla
                </p>
                <p>
                    ${{ $event->costo_taquilla }}.°°
                </p>
            </div>
            <hr>
            {{-- genero musical --}}
            <div class="event-detail-row">
                <p>
                    genero musical
                </p>
                <p>
                    {{ $event->musicalGenre->genero }}
                </p>
            </div>
            <hr>
            {{-- reservacion --}}
            <div class="event-detail-row">
                <p>
                    reservación
                </p>
                <p>
                    {{ !$event->reservacion ? 'No' : 'Sí'  }}
                </p>
            </div>
            <hr>
            {{-- cupos --}}
            <div class="event-detail-row">
                <p>
                    cupos
                </p>
                <p>
                    {{ $event->cupos ?? 'Entrada libre' }}
                </p>
            </div>
            <hr>
            {{-- tipo de evento --}}
            <div class="event-detail-row">
                <p>
                    tipo de evento
                </p>
                <p>
                    {{ $event->tipo_evento }}
                </p>
            </div>
            <hr>
            {{-- creado el --}}
            <div class="event-detail-row">
                <p>
                    fecha de creación
                </p>
                <p>
                    {{ $event->created_at }}
                </p>
            </div>
            {{-- actuañozad el --}}
            <hr>
            <div class="event-detail-row">
                <p>
                    fecha de la última actualización
                </p>
                <p>
                    {{ $event->updated_at }}
                </p>
            </div>
            <hr>
        </div>

        <div class="img-event-details">
            <img src="{{ img_u_url("events/$event->imagen") }}" alt="img-event">
        </div>
    </div>

</x-layouts.admin-layout>
