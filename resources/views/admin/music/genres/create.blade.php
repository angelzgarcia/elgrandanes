

<x-layouts.admin-layout titulo="El Gran Danés Café-Bar | Admin | Agregar Género Musical">

    @php
        $categories_exists = App\Models\MusicalGenreCategory::exists();
    @endphp

    <div class="create-form-container create-category-container">

        <h2 class="font-black">
            Agregar género musical
        </h2>

        <form class="create-form create-category" action="{{ route('admin.music-category.store') }}" method="post" enctype="multipart/form-data">
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
                    @error('category')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <select name="category">
                        @foreach ($categories as $category)
                            <option {{ old('category') === $category->categoria_musical ? 'selected' : '' }} value="{{ $category->categoria_musical }}">
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

    </div>

</x-layouts.admin-layout>
