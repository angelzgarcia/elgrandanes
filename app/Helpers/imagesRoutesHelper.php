
<?php

    if (!function_exists('img_d_url')) {
        function img_d_url($img_name) {
            return asset("/imgs/downloads/$img_name");
        }
    }

    if (!function_exists('img_u_url')) {
        function img_u_url ($filename) {
            return asset('/storage/imgs/uploads/'.$filename);
        }
    }

    if (!function_exists('img_a_url')) {
        function img_a_url($filename) {
            return asset('/storage/imgs/avatars/'.$filename);
        }
    }

    if (!function_exists('img_p_url')) {
        function img_p_url($filename) {
            return asset("/storage/imgs/profiles/$filename");
        }
    }

    if (!function_exists('img_f_url')) {
        function files_url($filename) {
            return asset("/storage/files/$filename");
        }
    }
