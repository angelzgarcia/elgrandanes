@props(['titulo' => 'El Gran Danés Café - Bar | Admin'])
<!DOCTYPE html>
<html lang="en">
<x-head :titulo=$titulo />
<body class="admin-home">
    <div class="custom-cursor"></div>
    <div class="cursor-point"></div>

    <div id="preloader">
        <div class="spinner">
            <div class="hole"></div>
        </div>
        <h1>EL GRAN DANÉS</h1>
    </div>

    <x-admin.header />

    <x-admin.sidebar />

    <main class="admin-slot">
        {{ $slot }}
    </main>

    @stack('js')
</body>
</html>
