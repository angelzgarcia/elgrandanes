
<x-layouts.user-layout titulo="El Gran Danés Café - Bar | Menú">
    <div class="menu-container">
        @php
            $menu_model = App\Models\Menu::class;
            $menu_exists = $menu_model::exists();
            $menu = null;
            if ($menu_exists)
                $menu = App\Models\Menu::latest('id')->first()->nombre_original;
        @endphp
        @if ($menu)
            <h2 class="font-black">
                Menú
            </h2>

            <div class="menu-view" id="pdf-container">
            </div>
            <div class="menu-foot shadow-lg">
            </div>
        @else
            <div class="menu-not-found mt-10">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M40.1 467.1l-11.2 9c-3.2 2.5-7.1 3.9-11.1 3.9C8 480 0 472 0 462.2L0 192C0 86 86 0 192 0S384 86 384 192l0 270.2c0 9.8-8 17.8-17.8 17.8c-4 0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1 3.9L269.3 506c-3.3 3.8-8.2 6-13.3 6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2 0L141.3 506c-3.3 3.8-8.2 6-13.3 6s-9.9-2.2-13.3-6L84.2 471c-11.3-12.9-30.7-14.6-44.1-3.9zM160 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                <div>
                    <h2 class="!text-black">
                        Estamos actualizando nuestro menú,
                    </h2>
                    <h2 class="!text-black">
                        ¡Consultalo muy pronto!
                    </h2>
                </div>
                <div class="go-back">
                    <a href="{{ route('home') }}">
                        <p>Volver al inicio</p>
                        <span class="shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
                        </span>
                    </a>
                </div>
            </div>
        @endif
    </div>

    @if ($menu_exists)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
        <script>
            var url = "{{ files_url( $menu) }}";

            pdfjsLib.getDocument(url).promise.then(function(pdf) {
                console.log("PDF cargado");

                // Función para renderizar todas las páginas
                var numPages = pdf.numPages;

                // Iterar sobre todas las páginas del PDF
                for (var pageNum = 1; pageNum <= numPages; pageNum++) {
                    // Obtener cada página del PDF
                    pdf.getPage(pageNum).then(function(page) {
                        console.log("Página " + page.pageNumber + " cargada");

                        // Crear un canvas para renderizar cada página
                        var canvas = document.createElement('canvas');
                        var context = canvas.getContext('2d');

                        // Ajustar la escala según el ancho de la ventana
                        var scale = window.innerWidth / page.getViewport({ scale: 1 }).width;

                        var viewport = page.getViewport({ scale: scale });

                        // Ajustar el tamaño del canvas para que coincida con el tamaño de la página
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Renderizar la página en el canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise.then(function() {
                            console.log("Página " + page.pageNumber + " renderizada");
                        });

                        // Agregar el canvas al contenedor de páginas
                        document.getElementById('pdf-container').appendChild(canvas);
                    });
                }
            }).catch(function(error) {
                console.error('Error al cargar el PDF:', error);
            });
        </script>
    @endif

</x-layouts.user-layout>
