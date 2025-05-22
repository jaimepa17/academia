<?php

define('SERVIDOR','localhost');
define('USUARIO','postgres');
define('PASSWORD','123');
define('BD','sisgestionescolar');

define('APP_NAME',' Académico');

define('APP_URL','http://localhost/academia');
define('KEY_API_MAPS','');

$servidor = "pgsql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD);
    // echo"conexion exitosa a la base de datos";
}catch(PDOException $e){
    print_r( $e);
    echo "Error No se pudo Conectar a la Base de Datos";
}

// require_once de la clase DB
require_once __DIR__ . '/../app/database/DB.php';

date_default_timezone_set('America/Managua'); // Establece tu zona horaria
$fechaHora = date('Y-m-d H:i:s'); 

$fecha_actual = date('Y-m-d');
$mes_actual = date('m');
$dia_actual = date('d');
$anio_actual = date('Y');

