

<x-layouts.admin-layout>
    <div class="menu-form-container">
        <h2>Actualizar menú</h2>
        <form action="{{ route('menu.update', $menu) }}" method="post" autocomplete="off" enctype="multipart/form-data" id="form-update">
            @csrf
            @method('put')

            <div id="drop-zone" class="drop-zone">
                <p>Arrastra y suelta el archivo aquí o haz clic para subir</p>
                <input type="file" name="menu" id="file-input" accept="application/pdf" style="display: none;">
            </div>
            <div class="file-info" id="file-info">

            </div>
            <button type="submit" id="submit-menu">
                Subir archivo
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="undefined"><path d="M440-320v-326L336-542l-56-58 200-200 200 200-56 58-104-104v326h-80ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
            </button>
        </form>
        <h3>Menú actual:</h3>
        <div class="pdf-view">
            <iframe src="{{ files_url($menu->nombre_original) }}"></iframe>
        </div>
    </div>
</x-layouts.admin-layout>

<script>
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const submitMenu = document.getElementById('submit-menu');
    const fileInfo = document.getElementById('file-info');
    const form = document.getElementById('form-update');

    fileInfo.style.display = 'none';
    let uploadedFile = null;

    submitMenu.addEventListener('click', async (e) => {
        e.preventDefault();
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
        if (!uploadedFile || uploadedFile.type !== 'application/pdf') {
            Toast.fire({
                icon: "warning",
                title: "¡No se ha cargado el archivo!",
                timer: 3000
            });
        } else {
            await Toast.fire({
                icon: "success",
                title: "¡Menú actualizado con éxito!",
                timer: 1300,
            });
            form.submit();
        }
    });

    dropZone.addEventListener('click', () => fileInput.click());

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, e => e.preventDefault());
        dropZone.addEventListener(eventName, e => e.stopPropagation());
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('dragover'));
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('dragover'));
    });

    dropZone.addEventListener('drop', e => {
        const file = e.dataTransfer.files[0];
        handleFile(file);
    });

    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        handleFile(file);
    });

    function handleFile(file) {
        if (!file) return;

        if (file.type !== 'application/pdf') {
            fileInfo.style.display = 'flex';
            fileInfo.innerHTML = 'Por favor, sube solo archivos PDF.';
            uploadedFile = null;
            return;
        }

        uploadedFile = file;
        fileInfo.style.display = 'flex';
        fileInfo.innerHTML = `Archivo recibido: ${file.name} (${(file.size / 1024).toFixed(2)} KB) ${file.type}`;
        fileInfo.innerHTML += `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
        `;
    }
</script>
