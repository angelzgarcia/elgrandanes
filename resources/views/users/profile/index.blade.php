

<x-layouts.user-layout titulo="{{env('APP_NAME')}} | Profile">

    <div class="user-profile-section">

        <h2 class="font-black">
            Hola, {{ Auth::user()->email }}
        </h2>

        <div class="user-account-actions-container">
            {{-- ACTUALIZAR INFORMACION DE LA CUENTA --}}
            <div class="legend-action legend-account-information">
                <span>Información del perfil</span>
                <p>
                    Actualice su información de perfil de la cuenta y correo electrónico
                </p>
            </div>
            <div class="account-details user-actions">
                <form class="create-form" action="{{ route('user.profile-details.update', Auth::user()->id) }}" method="post" autocomplete="off">
                    @csrf
                    @method('put')

                    {{-- nombres --}}
                    <fieldset class="flex flex-col">
                        <legend>Nombre(s)</legend>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input class="capitalize" type="text" name="name" value="{{ old('name') ?? Auth::user()->name }}">
                    </fieldset>
                    {{-- apellidos --}}
                    <fieldset class="flex flex-col">
                        <legend>Apellidos</legend>
                        @error('lastname')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input class="capitalize" type="text" name="lastname" value="{{ old('lastname') ?? Auth::user()->lastname }}">
                    </fieldset>
                    {{-- correo --}}
                    <fieldset class="flex flex-col">
                        <legend>Correo electrónico</legend>
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="text" name="email" value="{{ old('email') ?? Auth::user()->email }}">
                    </fieldset>

                    <button type="submit" class="font-black">
                        Guardar
                    </button>
                </form>
            </div>

            {{-- ACTUALIZAR CONTRASEÑA --}}
            <div class="legend-action legend-update-pass">
                <span>Actualizar contraseña</span>
                <p>
                    Asegúrese de que su cuenta utilice una contraseña larga y de ser posible aleatoria para mantenerse segura
                </p>
            </div>
            <div class="change-pass user-actions">
                <form class="create-form" action="{{ route('user.profile-password.update', Auth::user()->id) }}" method="post" autocomplete="off">
                    @csrf
                    @method('put')

                    {{-- contraseña actual --}}
                    <fieldset class="flex flex-col">
                        <legend>Contraseña actual</legend>
                        @error('current-pass')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="password" name="current-pass">
                    </fieldset>
                    {{-- contraseña nueva --}}
                    <fieldset class="flex flex-col">
                        <legend>Contraseña nueva</legend>
                        @error('new-pass')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="password" name="new-pass">
                    </fieldset>
                    {{-- confirmar contraseña nueva --}}
                    <fieldset class="flex flex-col">
                        <legend>Confirmar contraseña nueva</legend>
                        @error('new-pass-confirm')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <input type="password" name="new-pass-confirm">
                    </fieldset>

                    <button type="submit" class="font-black">
                        Guardar
                    </button>
                </form>
            </div>

            {{-- REGISTRO DE SESIONES --}}
            <div class="legend-action legend-session">
                <span>Sesiones de navegación</span>
                <p>
                    Gestione y cierre sus sesiones activas en otros navegadores y dispositivos
                </p>
            </div>
            <div class="sessions user-actions">
                <div class="create-form">
                    <p class="text-start text-gray-600">
                        Si es necesario, puede cerrar sesión en todas las demás sesiones de su navegador en todos sus dispositivos.
                        Algunas de sus sesiones recientes se enumeran a continuación; sin embargo, esta lista puede no ser exhaustiva.
                        Si cree que su cuenta ha sido comprometida, también debe actualizar su contraseña.
                    </p>

                    <div class="sessions-list">
                        @foreach ($sessions as $session)
                            <div class="session">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M80-160v-120h80v-440q0-33 23.5-56.5T240-800h600v80H240v440h240v120H80Zm520 0q-17 0-28.5-11.5T560-200v-400q0-17 11.5-28.5T600-640h240q17 0 28.5 11.5T880-600v400q0 17-11.5 28.5T840-160H600Zm40-120h160v-280H640v280Zm0 0h160-160Z"/></svg>
                                <div class="session-info">
                                    {{-- SO Y BROWSER --}}
                                    <h4>
                                        {{ $session->os }}
                                        -
                                        {{ $session->browser }}
                                    </h4>
                                    {{-- IP, LAST ACTIVITY --}}
                                    <p>
                                        {{ $session->ip_address }}
                                        <span>
                                            @if ($session->ip_address === $_SERVER['REMOTE_ADDR'])
                                                Este dispositivo,
                                                {{ $session->last_activity }}
                                            @else
                                                {{ $session->last_activity }}
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="" class="font-black uppercase">
                        cerrar otras sesiones de navegación
                    </a>
                </div>
            </div>

            {{-- CERRAR SESION --}}
            <form action="{{ route('logout') }}" class="logout-form" method="post">
                @csrf
                <button type="submit" class="logout-user font-black">
                    Cerrar sesión
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-120q-33 0-56.5-23.5T120-200v-160h80v160h560v-560H200v160h-80v-160q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm220-160-56-58 102-102H120v-80h346L364-622l56-58 200 200-200 200Z"/></svg>
                </button>
            </form>
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
    </div>

</x-layouts.user-layout>
