

<x-layouts.user-layout>
    <div class="login-container">
        <h2 class="font-black">
            SINGUP
        </h2>

        <form action="{{ route('singup') }}" method="post" autocomplete="off">
            @csrf

            <fieldset class="flex flex-col">
                <legend>Nombre(s)</legend>
                <input type="text" name="name" id="name">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </fieldset>
            <fieldset class="flex flex-col">
                <legend>Apellidos</legend>
                <input type="text" name="lastname" id="lastname">
                @error('lastname')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </fieldset>
            <fieldset class="flex flex-col">
                <legend>Correo electrónico</legend>
                <input type="text" name="email" id="email">
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

    <script>

    </script>
</x-layouts.user-layout>

