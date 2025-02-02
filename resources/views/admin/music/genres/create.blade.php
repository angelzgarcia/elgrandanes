

<x-layouts.admin-layout titulo="{{ env('APP_NAME') }} | Admin | Agregar Género Musical">

    @php
        $categories_exists = App\Models\MusicalGenreCategory::exists();
    @endphp

    <div class="create-form-container create-category-container">

        <h2 class="font-black">
            Agregar género musical
        </h2>

        <form class="create-form create-category" action="{{ route('admin.music-genre.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- genero musical --}}
            <fieldset class="flex flex-col">
                <legend>Nombre del género</legend>
                @error('genre')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="genre" id="genre" value="{{old('genre')}}" {{ !$categories_exists ? 'disabled' : '' }}>
            </fieldset>

            {{-- categoria musical --}}
            @if (!$categories_exists)
                <strong>¡No hay categorías musicales registradas! <br>
                    Primero
                        <a class="text-indigo-700 underline" href="{{ route('admin.music-category.create') }}">
                            ingrese
                        </a>
                    algunas para continuar.
                </strong>
            @else
                <fieldset class="flex flex-col">
                    <legend>Selecciona la categoría musical a la que pertenece este género</legend>
                    @error('category_id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <select name="category_id">
                        <option selected disabled>Categoría musical</option>
                        @foreach ($categories as $category)
                            <option {{ old('category') === $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->categoria_musical }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            @endif

            {{-- submit --}}
            <button type="submit" class="font-black {{ !$categories_exists ? 'tag-disabled' : '' }}" {{ !$categories_exists ? 'disabled' : '' }}>
                Crear género
            </button>
        </form>

        {{-- ALERTA --}}
        @if (session('swal'))
            <x-swal :title="session('swal.title')" />
        @endif
    </div>

</x-layouts.admin-layout>
