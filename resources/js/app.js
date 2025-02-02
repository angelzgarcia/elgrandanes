import './bootstrap';


// P R E   -  L O A D
const preloaderTimeout = 700;
const body = document.documentElement;
body.style.scrollbarWidth = "none";

window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");

    setTimeout(() => {
        preloader.style.opacity = "0";
        body.style.scrollbarWidth = "thin";
        setTimeout(() => {
            preloader.style.display = "none";
        }, 500);
    }, preloaderTimeout);
});


// C U R S O R    P O  I N T E R
const cursor = document.querySelector(".custom-cursor");
const point = document.querySelector(".cursor-point");
const links = document.querySelectorAll(".hover-target");

document.addEventListener("mousemove", (e) => {
    gsap.to(point, {
        x: e.clientX,
        y: e.clientY,
        duration: 0.1,
        ease: "power2.out"
    });

    gsap.to(cursor, {
        x: e.clientX,
        y: e.clientY,
        duration: 0.3,
        ease: "power2.out"
    });
});

links.forEach(link => {
    link.addEventListener("mouseenter", () => {
        gsap.to(point, { scale: 9, backgroundColor: "rgba(230, 153, 21, 0.36)", duration: 0.3 });
        gsap.to(cursor, { opacity: 0, duration: 0.3 });
    });

    link.addEventListener("mouseleave", () => {
        gsap.to(point, { scale: 1, backgroundColor: "var(--secondary-color)", duration: 0.3 });
        gsap.to(cursor, { opacity: 1, duration: 0.3 });
    });
});

document.addEventListener("click", () => {
    gsap.to(cursor, { scale: 1.5, duration: 0.2, ease: "power2.out" });
    gsap.to(cursor, { scale: 1, duration: 0.2, delay: 0.2, ease: "power2.out" });
});


// A L E R T A S    DE   C O N  F I MA C I O N
function showConfirmAlert(confirmTitle, form, confirmButtonText = 'Si, eliminar') {
    Swal.fire({
        title: confirmTitle,
        toast: true,
        icon: 'question',
        position: 'bottom-start',
        iconColor: 'white',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: 'Cancelar',
        confirmButtonText: confirmButtonText,
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
        if (result.isConfirmed) {
            form.submit();
        } else {
            Toast.fire({
                icon: "info",
                title: "Operación cancelada",
                timer: 3000
            });
        }
    });
}

