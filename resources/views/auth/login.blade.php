

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

            <button type="submit" class="font-black">Entrar</button>
        </form>

        <hr>

        <div class="singup-access">
            <h3>¿No tienes una cuenta?</h3>
            <a href="{{ route('singup.show') }}" class="font-bold">
                Registrate
            </a>
        </div>
    </div>

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timerProgressBar: true,
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: '{{ session('success') }}',
                timer: 3000
            });
        </script>
    @endif
</x-layouts.user-layout>

