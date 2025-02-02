<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Swal extends Component
{
    public $type, $icon, $title, $titleconf, $time;

    public function __construct($type = null, $icon = null, $title = null, $titleconf = null, $time = null)
    {
        $this -> type = $type ?? 'toast';
        $this -> icon = $icon ?? 'success';
        $this -> title = $title ?? 'Info';
        $this -> titleconf = $titleconf ?? '¿Está seguro de realizar esta acción?';
        $this -> time = $time ?? 3000;
    }

    public function render(): View|Closure|string
    {
        return match ($this -> type) {
            'toast' => $this -> toast(),
            'confirm' => $this -> confirm(),
            default => $this -> toast(),
        };
    }

    protected function toast()
    {
        return <<<HTML
            <script>
                document.addEventListener("DOMContentLoaded", function () {
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
                    setTimeout(() => {
                        Toast.fire({
                            icon: {$this->jsonEncode($this->icon)},
                            title: {$this->jsonEncode($this->title)},
                            timer: {$this->jsonEncode($this->time)}
                        });
                    }, 870);
                });
            </script>
        HTML;
    }

    protected function confirm()
    {
        return <<<HTML
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.querySelectorAll('.submit-delete').forEach(button => {
                        button.addEventListener('click', function () {
                            const form = document.getElementById(this.dataset.form);
                            
                            Swal.fire({
                                title: this.dataset.title,
                                toast: true,
                                icon: 'question',
                                position: 'center-end',
                                iconColor: 'white',
                                showCancelButton: true,
                                showConfirmButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                cancelButtonText: 'Cancelar',
                                confirmButtonText: this.dataset.confirm,
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
                        });
                    });
                });
            </script>
        HTML;
    }

    private function jsonEncode($value): string
    {
        return json_encode($value, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    }
}
