

<x-layouts.admin-layout titulo="El Gran Danés Café-Bar | Admin | Agregar Categoría Musical">

    <div class="create-form-container create-category-container">

        <h2 class="font-black">
            Agregar categoría de género musical
        </h2>

        <form class="create-form create-category" action="{{ route('admin.music-category.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- categoria musical --}}
            <fieldset class="flex flex-col">
                <legend>Nombre de la categoría</legend>
                @error('category')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="category" id="category" value="{{ old('category') }}">
            </fieldset>

            {{-- submit --}}
            <button type="submit" class="font-black">
                Crear categoría
            </button>
        </form>

    </div>

</x-layouts.admin-layout>
