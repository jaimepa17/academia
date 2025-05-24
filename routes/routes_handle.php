<?php
// Archivo de entrada principal y router

// Cargar configuración y rutas
require_once '../config/config.php';
require_once '../routes/routes.php';

// Obtener la URL solicitada (parámetro 'url' en GET)
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/'); // Eliminar barra final si existe

$routeFound = false;

// Recorrer todas las rutas definidas
foreach ($routes as $route => $target) {
    // Convertir la ruta a una expresión regular
    // Reemplaza {param} por ([^/]+) para capturar parámetros dinámicos
    $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $route);
    $pattern = str_replace('/', '\/', $pattern);
    $pattern = '/^' . $pattern . '$/';

    // Verificar si la URL coincide con la ruta actual
    if (preg_match($pattern, $url, $matches)) {
        $routeFound = true;
        $controller = $target['controller']; // Nombre del controlador
        $action = $target['action'];         // Nombre del método/acción
        // Extraer parámetros capturados de la URL
        $params = array_slice($matches, 1);
        break;
    }
}

// Si no se encontró una ruta válida:
if (!$routeFound) {
    // Si es un POST (por ejemplo, login), mostrar error 404
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        http_response_code(404);
        echo 'Ruta POST no válida.';
        exit();
    }
    // --- Fallback dinámico tipo /controlador/accion/param1/param2 ---
    $parts = explode('/', $url);
    if (count($parts) >= 2) {
        $controller = $parts[0];
        $action = $parts[1];
        $params = array_slice($parts, 2);
        $controllerFile = '../controllers/' . $controller . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controller)) {
                $obj = new $controller();
                if (method_exists($obj, $action)) {
                    call_user_func_array([$obj, $action], $params);
                    exit();
                }
            }
        }
    }
    // Si falla el fallback, mostrar error 404 personalizado
    http_response_code(404);
    echo '<!DOCTYPE html><html><head><title>404 No encontrado</title><style>body{font-family:sans-serif;background:#f8f8f8;text-align:center;padding:60px;}h1{color:#2575fc;}p{color:#444;}</style></head><body><h1>404 - Página no encontrada</h1><p>La ruta solicitada no existe.<br>Verifica la URL o regresa a <a href="'.APP_URL.'">la página principal</a>.</p></body></html>';
    exit();
}

// Construir la ruta del archivo del controlador
$controllerFile = '../controllers/' . $controller . '.php';

// Verificar si el archivo del controlador existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    // Verificar si la clase del controlador existe
    if (class_exists($controller)) {
        $obj = new $controller();
        // Verificar si el método/acción existe en el controlador
        if (method_exists($obj, $action)) {
            // Llamar al método del controlador, pasando los parámetros si existen
            call_user_func_array([$obj, $action], isset($params) ? $params : array());
        } else {
            // Acción no encontrada, mostrar error 404 si es POST, si no redirigir
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                http_response_code(404);
                echo 'Acción POST no válida.';
                exit();
            }
            header('Location: '.APP_URL.'/public/');
            exit();
        }
    } else {
        // Clase del controlador no encontrada
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            http_response_code(404);
            echo 'Controlador POST no válido.';
            exit();
        }
        header('Location: '.APP_URL.'/public/');
        exit();
    }
} else {
    // Archivo del controlador no encontrado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        http_response_code(404);
        echo 'Archivo de controlador POST no válido.';
        exit();
    }
    header('Location: '.APP_URL.'/public/');
    exit();
}
