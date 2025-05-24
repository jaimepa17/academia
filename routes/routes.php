<?php
// =====================================
// Definición de rutas personalizadas
// Sintaxis:
// 'ruta' => ['controller' => 'Controlador', 'action' => 'metodo']
// Puedes usar parámetros con llaves, ejemplo: 'usuarios/ver/{id}'
// =====================================

$routes = [
    // Ruta principal
    'home' => ['controller' => 'home', 'action' => 'index'],

    // Autenticación
    'login' => ['controller' => 'login', 'action' => 'index'],
    //'login/{param}' => ['controller' => 'login', 'action' => 'index'],
    'login/auth' => ['controller' => 'login', 'action' => 'auth'],
    
    'logout' => ['controller' => 'login', 'action' => 'logout'],

    // Vista de reporte de nota
    'reporte_general' => ['controller' => 'reportes', 'action' => 'nota'],
    'reporte_general/{valor}' => ['controller' => 'reportes', 'action' => 'nota'],
    // Agrega aquí más rutas personalizadas siguiendo el ejemplo
];
