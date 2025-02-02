

<x-layouts.user-layout>
    <div class="login-container">
        <h2 class="font-black">
            SINGUP
        </h2>

        <form action="{{ route('singup') }}" method="post" autocomplete="off" class="login-singup-forms">
            @csrf

            <fieldset class="flex flex-col">
                <legend>Nombre(s)</legend>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </fieldset>
            <fieldset class="flex flex-col">
                <legend>Apellidos</legend>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </fieldset>
            <fieldset class="flex flex-col">
                <legend>Correo electrónico</legend>
                <input type="text" name="email" id="email" value="{{ old('email') }}">
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

            {{-- TERMINOS Y CONDICIONES --}}
            <fieldset class="relative flex flex-row gap-6 text-center w-full justify-between items-center">
                <div class="absolute bottom-4">
                    <input type="checkbox" name="term_cond" id="remember">
                </div>
                <div class="flex items-center ml-12">
                    <span class="text-start text-sm">
                        He leído y acepto los
                        <strong>
                            <a href="">
                                Términos del Servicio y Política de Privacidad
                            </a>
                        </strong>
                    </span>
                </div>
                @error('remember')
                    <div class="text-red-500">{{$message}}</div>
                @enderror
            </fieldset>

            <button type="submit" class="font-black">Registrarse</button>
        </form>

        <hr>

        <div class="singup-access">
            <h3>¿Ya tienes una cuenta?</h3>
            <a href="{{ route('login.show') }}" class="font-bold">
                Inicia sesión
            </a>
        </div>
    </div>

</x-layouts.user-layout>

