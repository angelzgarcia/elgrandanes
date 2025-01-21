
<aside class="admin-sidebar">
    <div class="sidebar-content">
        @php
            use Carbon\Carbon;
            Carbon::setLocale('es');
            $fecha = Carbon::now()->translatedFormat('l, d F Y H:i:s');

            $menuExists = App\Models\Menu::exists();
            $menu = App\Models\Menu::latest('id')->first();
        @endphp
        <p class="capitalize">{{ $fecha }}</p>

        <h1 class="title-sidebar">El gran danés</h1>

        <div class="sidebar-options">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">Ver administradores</a>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-440q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0-80q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0 440q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-400Zm0-315-240 90v189q0 54 15 105t41 96q42-21 88-33t96-12q50 0 96 12t88 33q26-45 41-96t15-105v-189l-240-90Zm0 515q-36 0-70 8t-65 22q29 30 63 52t72 34q38-12 72-34t63-52q-31-14-65-22t-70-8Z"/></svg>
                </li>
                <li>
                    <a href="">Agregar administrador</a>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg>
                </li>

                @if (!$menuExists)
                    <li>
                        <a href="{{ route('menu.create') }}">Agregar menú</a>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                    </li>
                @else
                    <li>
                        <a href="{{ route('menu.show', $menu) }}">Ver menú</a>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                    </li>
                    <li>
                        <a href="{{ route('menu.edit', $menu) }}">Actualizar menú</a>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-160v-80h400v80H280Zm160-160v-327L336-544l-56-56 200-200 200 200-56 56-104-103v327h-80Z"/></svg>
                    </li>
                    <li>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;" id="form-destroy">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="submit-delete" style="background:none; border:none; cursor:pointer;">
                                Eliminar menú
                            </button>
                        </form>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                        </svg>
                    </li>
                @endif
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: flex; justify-content: space-between; width: 100%;">
                        @csrf
                        <button type="submit" class="flex flex-row justify-between w-full">
                            Cerrar sesión
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
                            </svg>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</aside>

<script>
    const button = document.getElementById('submit-delete');
    const formDestroy = document.getElementById('form-destroy');

    button.addEventListener('click', e => {
        e.preventDefault();

        Swal.fire({
            title: '¿Estas seguro de eliminar el fichero?',
            toast: true,
            icon: 'question',
            position: 'bottom-start',
            iconColor: 'white',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar',
            customClass: {
                popup: 'colored-toast',
            },
        }).then((result) => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-start",
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
            if (result.isConfirmed)
                Toast.fire({
                    icon: "success",
                    title: "¡El menú ha sido eliminado!",
                    timer: 1100
                }).then(() => {
                    formDestroy.submit();
                })
            else
                Toast.fire({
                    icon: "info",
                    title: "Operación cancelada",
                    timer: 3000
                });
        });
    })
</script>
