

<x-layouts.user-layout>
    <div class="login-container">
        <h2 class="font-black">LOGIN</h2>

        <form action="{{ route('login') }}" method="post" autocomplete="off" class="login-singup-forms">
            @csrf

            @error('error')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <fieldset class="flex flex-col">
                <legend>Correo electrónico</legend>
                <input type="text" name="email" id="email" value="{{old('email')}}"">
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </fieldset>
            <fieldset class="flex flex-col">
                <legend>Contraseña</legend>
                <input type="password" name="password" id="pass">
                @error('password')
                    <div class="text-red-500">{{$message}}</div>
                @enderror
            </fieldset>

            {{-- MANTENER SESION ACTIVA --}}
            <fieldset class="flex flex-row-reverse text-center w-full justify-end gap-6 relative items-center">
                <div class="flex items-center ml-10">
                    <legend class="font-bold !text-gray-900 text-start">Mantener sesión activa</legend>
                </div>
                <div class="absolute top-0.5">
                    <input type="checkbox" name="remember" id="remember">
                </div>
                @error('remember')
                    <div class="text-red-500">{{$message}}</div>
                @enderror
            </fieldset>

            <button type="submit" class="font-black">Entrar</button>
        </form>

        <hr>

        <div class="singup-access">
            <h3>¿No tienes una cuenta?</h3>
            <a href="{{ route('singup.show') }}" class="font-bold">
                Registrate
            </a>
        </div>

        @if (session('swal'))
            <x-swal
                :icon={{session('swal.icon')}}
                :title={{session('swal.title')}}
            />
        @endif
    </div>

</x-layouts.user-layout>

