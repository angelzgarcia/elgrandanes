

<x-layouts.admin-layout titulo="El Grand Danés Café - Bar | Eventos">

    <div class="events-grid-table-container">
        <h2>
            Registro de eventos
        </h2>

        <div class="admin-events-grid">
            @foreach ($events as $event)
                {{
                    $event
                }}
                <br>
            @endforeach
        </div>
    </div>

    <div class="paginador w-full">
        {{$events->links()}}
    </div>

</x-layouts.admin-layout>
