@props(['titulo' => 'El Gran Danés Café - Bar | Home'])
<!DOCTYPE html>
<html lang="en">
<x-head :titulo='$titulo' />
<body class="users-home">
    <div class="custom-cursor"></div>
    <div class="cursor-point"></div>

    <div id="preloader">
        <div class="spinner">
            <div class="hole"></div>
        </div>
        <h1>EL GRAN DANÉS</h1>
    </div>

    <x-users.header />

    <main class="users-slot" id="users-slot">
        {{ $slot }}
    </main>

    <x-users.footer />

    @stack('js')
</body>
</html>
