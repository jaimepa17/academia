<?php
// Función dd() estilo Laravel para debug
if (!function_exists('dd')) {
    function debug(...$vars) {
        echo '<pre style="background:#222;color:#bada55;padding:10px;font-size:16px;">';
        foreach ($vars as $v) {
            var_dump($v);
        }
        echo '</pre>';
        die();
    }
}

// Alias debuger
if (!function_exists('debuger')) {
    function debuger(...$vars) {
        debug(...$vars);
    }
}
