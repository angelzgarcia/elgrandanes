

<x-layouts.user-layout titulo="El Gran Danés Café - Bar | Próximos Eventos">

    @if (empty($events))
        <div class="menu-container">
            <div class="menu-not-found mt-10">
                <div class="flex no-events">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M560-160v-80h104L537-367l57-57 126 126v-102h80v240H560Zm-344 0-56-56 504-504H560v-80h240v240h-80v-104L216-160Zm151-377L160-744l56-56 207 207-56 56Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M220-240v-480h80v480h-80Zm520 0L380-480l360-240v480Zm-80-240Zm0 90v-180l-136 90 136 90Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M360-320h80v-320h-80v320Zm160 0h80v-320h-80v320ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M660-240v-480h80v480h-80Zm-440 0v-480l360 240-360 240Zm80-240Zm0 90 136-90-136-90v180Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="10px" viewBox="0 -960 960 960" width="10px" fill="undefined"><path d="M280-80 120-240l160-160 56 58-62 62h406v-160h80v240H274l62 62-56 58Zm-80-440v-240h486l-62-62 56-58 160 160-160 160-56-58 62-62H280v160h-80Z"/></svg>
                </div>
                <div>
                    <h2 class=" !text-black">
                        Pronto habrá más eventos,
                    </h2>
                    <h2 class="!text-black">
                        ¡No te los pierdas!
                    </h2>
                </div>
                <div class="go-back">
                    <a href="{{ route('home') }}">
                        <p>Volver al inicio</p>
                        <span class="shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="upcoming-events-section">
            {{-- imagen --}}
            <div class="img-upc-event">
                <img src="{{ img_u_url("events/{$currentEvent->imagen}") }}" alt="next-upcoming-event">
            </div>

            {{-- evento seleccionado o más próximo --}}
            <div class="data-upc-event">
                {{-- fecha del evento --}}
                <h2 class="font-black">
                    {{ $currentEvent->fecha_formateada }}
                </h2>

                <a href="">
                    Hacer reservación
                </a>

                <div class="details">
                    {{-- horario --}}
                    <p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M480-240q100 0 170-70t70-170q0-100-70-170t-170-70v240L310-310q35 33 78.5 51.5T480-240Zm0 160q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                            Horario:
                        </span>
                        <span>
                            {{ $currentEvent->horario }}
                        </span>
                    </p>
                    <hr>
                    {{-- costo --}}
                    <p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zM272 192l224 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-224 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16l224 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-224 0c-8.8 0-16-7.2-16-16zM164 152l0 13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9l0 13.8c0 11-9 20-20 20s-20-9-20-20l0-14.6c-10.3-2.2-20-5.5-28.2-8.4c0 0 0 0 0 0s0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5l0-14c0-11 9-20 20-20s20 9 20 20z"/></svg>
                            Costo:
                        </span>
                        <span>
                            @if ($currentEvent->costo_preventa === 0.0 && $currentEvent->costo_taquilla === 0.0)
                                Entrada libre
                            @else
                                Preventa: ${{ $currentEvent->costo_preventa }}
                                <br>
                                Taquilla: ${{ $currentEvent->costo_taquilla }}
                            @endif
                        </span>
                    </p>
                    <hr>
                    {{-- reservación --}}
                    <p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg>
                            Reservación
                        </span>
                        <span>
                            {{ $currentEvent->reservacion === 0 ? 'No' : 'Sí' }}
                        </span>
                    </p>
                    <hr>
                    {{-- cupo --}}
                    <p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M160-120v-240h640v240h-80v-160H240v160h-80Zm20-280q-25 0-42.5-17.5T120-460q0-25 17.5-42.5T180-520q25 0 42.5 17.5T240-460q0 25-17.5 42.5T180-400Zm100 0v-360q0-33 23.5-56.5T360-840h240q33 0 56.5 23.5T680-760v360H280Zm500 0q-25 0-42.5-17.5T720-460q0-25 17.5-42.5T780-520q25 0 42.5 17.5T840-460q0 25-17.5 42.5T780-400Zm-420-80h240v-280H360v280Zm0 0h240-240Z"/></svg>
                            Lugares disponibles:
                        </span>
                        <span>
                            {{
                                $currentEvent->cupos ?? 'Cupo disponible hasta completar aforo.'
                            }}
                        </span>
                    </p>
                    <hr>
                    <p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M740-560h140v80h-80v220q0 42-29 71t-71 29q-42 0-71-29t-29-71q0-42 29-71t71-29q8 0 18 1.5t22 6.5v-208ZM120-160v-112q0-35 17.5-63t46.5-43q62-31 126-46.5T440-440q42 0 83.5 6.5T607-414q-20 12-36 29t-28 37q-26-6-51.5-9t-51.5-3q-57 0-112 14t-108 40q-9 5-14.5 14t-5.5 20v32h321q2 20 9.5 40t20.5 40H120Zm320-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T520-640q0-33-23.5-56.5T440-720q-33 0-56.5 23.5T360-640q0 33 23.5 56.5T440-560Zm0-80Zm0 400Z"/></svg>
                            Género musical:
                        </span>
                        <span>
                            {{ ucfirst($currentEvent->genero) }}
                        </span>
                    </p>
                    <hr>
                </div>
            </div>

            {{-- lista de proximos eventos --}}
            <div class="list-of-events">
                {{-- eventos fijos --}}
                <div class="list-fixed-events">
                    <h3 class="font-black">
                        Eventos fijos
                    </h3>

                    {{-- evento fijo --}}
                    @foreach ($events as $event)
                        @if ($event->tipo_evento === 'fijo')
                            <div class="event">
                                <div class="event-img">
                                    <a href="{{ route('events.updateCurrentEvent', $event->slug) }}">
                                        <img src="{{ img_u_url("events/{$event->imagen}") }}" alt="upcoming-event" loading="lazy">
                                    </a>
                                </div>
                                <p>
                                    {{ ucfirst($event->fecha_formateada) }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- eventos ocacionales --}}
                <div class="upcoming-list-events">
                    <h3 class="font-black">
                        Eventos de la semana
                    </h3>

                    {{-- evento ocacional --}}
                    @foreach ($events as $event)
                        @if ($event->tipo_evento === 'ocacional')
                            <div class="event">
                                <div class="event-img">
                                    <a href="{{ route('events.updateCurrentEvent', $event->slug) }}">
                                        <img src="{{ img_u_url("events/{$event->imagen}") }}" alt="upcoming-event">
                                    </a>
                                </div>
                                <p>
                                    {{ ucfirst($event->fecha_formateada) }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    @endif

</x-layouts.user-layout>
