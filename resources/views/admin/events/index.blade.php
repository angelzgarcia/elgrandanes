

<x-layouts.admin-layout titulo="El Grand Danés Café - Bar | Eventos">

    <div class="crud-grid-table-container">
        <h2 class="font-black">
            Registro de eventos
        </h2>

        {{-- thead --}}
        <div class="headers-crud-grid">
            <div class="row-header-crud">
                <div class="headers-crud">
                    <div class="header-event">
                        Fecha
                    </div>
                    <div class="header-event">
                        Tipo de evento
                    </div>
                    <div class="header-event">
                        Género musical
                    </div>
                    <div class="header-event">
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
                                {{ $event->genero }}
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
                        <form action="" method="post" class="destroy-action">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- paginador --}}
        <div class="paginador">
            {{$events->links()}}
        </div>
    </div>

</x-layouts.admin-layout>
