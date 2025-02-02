

<x-layouts.admin-layout titulo="{{ env('APP_NAME') }} | Admin | Géneros Musicales">

    <div class="crud-grid-table-container">

        <h2 class="font-black">
            Registro de genéros musicales
        </h2>

        @if ($genres->isEmpty())
            <div class="empty-table">
                <div class="not-found-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-80q-83 0-141.5-58.5T80-280q0-83 58.5-141.5T280-480q83 0 141.5 58.5T480-280q0 83-58.5 141.5T280-80Zm544-40L568-376q-12-13-25.5-26.5T516-428q38-24 61-64t23-88q0-75-52.5-127.5T420-760q-75 0-127.5 52.5T240-580q0 6 .5 11.5T242-557q-18 2-39.5 8T164-535q-2-11-3-22t-1-23q0-109 75.5-184.5T420-840q109 0 184.5 75.5T680-580q0 43-13.5 81.5T629-428l251 252-56 56Zm-615-61 71-71 70 71 29-28-71-71 71-71-28-28-71 71-71-71-28 28 71 71-71 71 28 28Z"/></svg>
                </div>
                <div class="not-found-legend">
                    ¡No hay géneros registrados aún!
                </div>
                <div class="go-back">
                    <a href="{{ route('admin.music-genre.create') }}" class="hover-target">
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
                            Nombre
                        </div>
                        <div class="header-grid">
                            Categoría musical
                        </div>
                        <div class="header-grid">
                            Fecha de creación
                        </div>
                    </div>

                    <div class="white-space">
                        Operaciones
                    </div>
                </div>
            </div>
            {{-- tbody --}}
            <div class="admin-crud-row-flex">
                @foreach ($genres as $genre)
                    <div class="crud-grid">
                        {{-- data --}}
                        <div class="crud-grid-data">
                            <a>
                                <p>
                                    {{ $genre->genero }}
                                </p>
                                <p>
                                    {{ $genre->musicalCategory->categoria_musical }}
                                </p>
                                <p>
                                    {{ $genre->created_at }}
                                </p>
                            </a>
                        </div>

                        {{-- edit & delete --}}
                        <div class="crud-action-buttons">
                            <x-delete-button
                                :formId="'delete-form-'.$genre->id"
                                :action="route('admin.music-genre.destroy', $genre->id)"
                                title="¿Eliminar el genreo {{ $genre->genero }}?"
                            />
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- paginador --}}
            <div class="paginador">
                {{$genres->links()}}
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
