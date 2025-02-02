

<x-layouts.admin-layout titulo="{{ env('APP_NAME') }} | Eventos">

    <div class="crud-grid-table-container">

        <h2 class="font-black">
            Registro de eventos
        </h2>

        @if ($events->isEmpty())
            <div class="empty-table">
                <div class="not-found-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-80q-83 0-141.5-58.5T80-280q0-83 58.5-141.5T280-480q83 0 141.5 58.5T480-280q0 83-58.5 141.5T280-80Zm544-40L568-376q-12-13-25.5-26.5T516-428q38-24 61-64t23-88q0-75-52.5-127.5T420-760q-75 0-127.5 52.5T240-580q0 6 .5 11.5T242-557q-18 2-39.5 8T164-535q-2-11-3-22t-1-23q0-109 75.5-184.5T420-840q109 0 184.5 75.5T680-580q0 43-13.5 81.5T629-428l251 252-56 56Zm-615-61 71-71 70 71 29-28-71-71 71-71-28-28-71 71-71-71-28 28 71 71-71 71 28 28Z"/></svg>
                </div>
                <div class="not-found-legend">
                    ¡No hay eventos registrados aún!
                </div>
                <div class="go-back">
                    <a href="{{ route('admin.events.create') }}" class="hover-target">
                        <p>Registra algunos para comenzar</p>
                        <span class="shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M80-240v-480h80v480H80Zm560 0-57-56 144-144H240v-80h487L584-664l56-56 240 240-240 240Z"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        @else
            {{-- thead --}}
            <div class="headers-crud-grid">
                <div class="row-header-crud">
                    <div class="headers-crud">
                        <div class="header-grid">
                            Fecha
                        </div>
                        <div class="header-grid">
                            Tipo de evento
                        </div>
                        <div class="header-grid">
                            Género musical
                        </div>
                        <div class="header-grid">
                            Cupos
                        </div>
                    </div>

                    <div class="white-space">
                        Operaciones
                    </div>
                </div>
            </div>
            {{-- tbody --}}
            <div class="admin-crud-row-flex">
                @foreach ($events as $event)
                    <div class="crud-grid">
                        {{-- data --}}
                        <div class="crud-grid-data">
                            <a href="{{ route('admin.events.show', $event->slug) }}">
                                <p>
                                    {{ $event->fecha }}
                                </p>
                                <p>
                                    {{ $event->tipo_evento }}
                                </p>
                                <p>
                                    {{ $event->musicalGenre->genero }}
                                </p>
                                <p>
                                    {{ $event->cupos ?? 'Entrada libre' }}
                                </p>
                            </a>
                        </div>

                        {{-- edit & delete --}}
                        <div class="crud-action-buttons">
                            <div class="edit-action">
                                <a href="{{ route('admin.events.edit', $event->slug) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z"/></svg>
                                </a>
                            </div>
                            <x-delete-button
                                :formId="'delete-form-'.$event->id"
                                :action="route('admin.events.destroy', $event->id)"
                                title="¿Eliminar el evento {{ $event->fecha }} - {{ $event->horario }}?"
                            />
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- paginador --}}
            <div class="paginador">
                {{$events->links()}}
            </div>

            {{-- confirm delete action --}}
            <x-swal type='confirm' />

            {{-- success destroy --}}
            @if (session('swal'))
                <x-swal :title="session('swal')" />
            @endif
        @endif

    </div>

</x-layouts.admin-layout>
