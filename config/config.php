<?php
// -----------------------------------------------------------------------------
// CONFIGURACIÓN GLOBAL DEL PROYECTO ACADEMIA
// -----------------------------------------------------------------------------
// Este archivo centraliza la configuración de base de datos, constantes globales,
// helpers, zona horaria y la URL base del sistema (APP_URL).
//
// APP_URL se autoconfigura según el dominio y la carpeta donde esté instalado
// el proyecto, permitiendo acceso desde localhost, subcarpetas o dominios locales
// (ej: http://academia.local, http://localhost/academia, etc.)
// -----------------------------------------------------------------------------

// Configuración de la base de datos
// Cambia los valores según tu entorno

define('SERVIDOR','localhost');
define('USUARIO','root'); // Usuario de MySQL
define('PASSWORD','');    // Contraseña de MySQL
define('BD','sisacademia'); // Nombre de la base de datos

define('APP_NAME',' Académico'); // Nombre de la aplicación

// URL base del sistema (autodetectada)
define('APP_URL','http://localhost/academia');

define('KEY_API_MAPS',''); // Llave para APIs externas (ejemplo)

// Conexión PDO global
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    // echo "Conexión exitosa a la base de datos";
}catch(PDOException $e){
    print_r($e);
    echo "Error: No se pudo conectar a la base de datos";
}

// Carga de clases y helpers globales
require_once __DIR__ . '/../app/database/DB.php';
require_once __DIR__ . '/../app/core/BaseController.php';
require_once __DIR__ . '/../app/core/helpers.php';

// Zona horaria y utilidades de fecha
// Cambia 'America/Managua' por tu zona si es necesario

date_default_timezone_set('America/Managua');
$fechaHora = date('Y-m-d H:i:s'); 
$fecha_actual = date('Y-m-d');
$mes_actual = date('m');
$dia_actual = date('d');
$anio_actual = date('Y');

