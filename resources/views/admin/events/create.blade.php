

<x-layouts.admin-layout titulo='El Gran Danés Café - Bar | Admin | Crear evento'>

    <div class="events-form-container">

        <h2 class="font-black">
            Agregar evento
        </h2>

        <form action="{{ route('admin.events.store') }}" method="post" class="events-form" enctype="multipart/form-data">
            @csrf

            {{-- fecha --}}
            <fieldset class="flex flex-col">
                <legend>Fecha del evento</legend>
                @error('date')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="date" name="date" id="event-date" value="{{old('date')}}">
            </fieldset>
            {{-- genero musical --}}
            <fieldset class="flex flex-col">
                <legend>Género musical</legend>
                @error('musical_genre')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <select name="musical_genre" id="musical_genre">
                    <option value="" disabled selected></option>
                    <optgroup label="Populares">
                        <option value="pop">Pop</option>
                        <option value="rock">Rock</option>
                        <option value="hiphop">Hip Hop</option>
                        <option value="reggaeton">Reggaetón</option>
                    </optgroup>
                    <optgroup label="Latinos">
                        <option value="salsa">Salsa</option>
                        <option value="bachata">Bachata</option>
                        <option value="cumbia">Cumbia</option>
                        <option value="merengue">Merengue</option>
                    </optgroup>
                    <optgroup label="Electrónica">
                        <option value="electronica">Electrónica</option>
                        <option value="house">House</option>
                        <option value="techno">Techno</option>
                        <option value="trance">Trance</option>
                    </optgroup>
                    <optgroup label="Tradicional y regional">
                        <option value="norteño">Norteño</option>
                        <option value="mariachi">Mariachi</option>
                        <option value="banda">Banda</option>
                        <option value="ranchera">Ranchera</option>
                    </optgroup>
                </select>
            </fieldset>
            {{-- horario --}}
            <fieldset class="flex flex-col">
                <legend>Horario</legend>
                @error('start_event')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Inicio del evento</span>
                    <input type="time" name="start_event" id="start_event" value="{{old('start_event')}}">
                </div>
                @error('end_event')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Término o cierre del evento</span>
                    <input type="time" name="end_event" id="end_event" value="{{old('end_event')}}">
                </div>
            </fieldset>
            {{-- costo --}}
            <fieldset class="flex flex-col">
                <legend>Costo del acceso</legend>
                <strong><small>Si la entrada es libre, deje los siguientes campos vacíos.</small></strong>
                @error('pre_sale_cost')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Pre-venta</span>
                    <input type="text" name="pre_sale_cost" id="pre_sale_cost" value="{{old('pre_sale_cost')}}">
                </div>
                @error('ticket_cost')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Taquilla</span>
                    <input type="text" name="ticket_cost" id="ticket_cost" value="{{old('ticket_cost')}}">
                </div>
            </fieldset>
            {{-- reservacion --}}
            <fieldset class="flex flex-col">
                <legend>Reservación</legend>
                @error('reservation')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Sí</span>
                    <input type="radio" name="reservation" value="si" {{ old('reservation') === 'si' ? 'checked' : '' }}>
                </div>
                <div>
                    <span>No</span>
                    <input type="radio" name="reservation" value="no" {{ old('reservation') === 'no' ? 'checked' : '' }}>
                </div>
            </fieldset>
            {{-- topo de evento --}}
            <fieldset class="flex flex-col">
                <legend>Tipo de evento</legend>
                @error('event_type')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div>
                    <span>Fijo</span>
                    <input type="radio" name="event_type" value="fijo" {{ old('event_type') === 'fijo' ? 'checked' : '' }}>
                </div>
                <div>
                    <span>Ocacional</span>
                    <input type="radio" name="event_type" value="ocacional" {{ old('event_type') === 'ocacional' ? 'checked' : '' }}>
                </div>
            </fieldset>
            {{-- cupos --}}
            <fieldset class="flex flex-col">
                <legend>Cupos</legend>
                @error('quotas')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <strong><small>Si la entrada es libre, deje el siguiente campo vacío.</small></strong>
                <input type="number" name="quotas" id="quotas" value="{{old('quotas')}}">
            </fieldset>
            {{-- facebook --}}
            <fieldset class="flex flex-col">
                <legend>Facebook (URL)</legend>
                @error('fb')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="fb" id="fb-event" value="{{old('fb')}}" placeholder="Dejar vacío si no aplica">
            </fieldset>
            {{-- instagram --}}
            <fieldset class="flex flex-col">
                <legend>Instagram (URL)</legend>
                @error('instagram')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="instagram" id="instagram-event" value="{{old('instagram')}}" placeholder="Dejar vacío si no aplica">
            </fieldset>
            {{-- youtube --}}
            <fieldset class="flex flex-col">
                <legend>Canal de YouTube (URL)</legend>
                @error('youtube')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="text" name="youtube" id="youtube-event" value="{{old('youtube')}}" placeholder="Dejar vacío si no aplica">
            </fieldset>
            {{-- imagen --}}
            <fieldset class="flex flex-col">
                <legend>Imagen</legend>
                @error('image_event')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <input type="file" name="image_event" id="image_event" accept="image/jpg,png,jpeg">
            </fieldset>

            {{-- submit --}}
            <button type="submit" class="font-black">
                Crear evento
            </button>
        </form>

    </div>

    <script>

    </script>

</x-layouts.admin-layout>
