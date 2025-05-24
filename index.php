<?php
// Redirige automáticamente a la ruta /home/index usando la constante APP_URL si está definida
require_once __DIR__ . '/config/config.php';
$url = defined('APP_URL') ? APP_URL . '/home/index' : '/home/index';
header('Location: ' . $url);
exit;
?>