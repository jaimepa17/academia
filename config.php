<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sisgestionescolar');

define('APP_NAME','SISTEMA DE GESTIÓN ESCOLAR');
define('APP_URL','http://localhost/SIS_ACADEMICO');
define('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    // echo"conexion exitosa a la base de datos";
}catch(PDOException $e){
    print_r( $e);
    echo "Error No se pudo Conectar a la Base de Datos";
}

class DB {
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo === null) {
            $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
            self::$pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        }
        return self::$pdo;
    }

    public static function select($sql, $params = []) {
        $stmt = self::connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }
    // Puedes agregar más métodos como insert, update, delete si lo necesitas
}

date_default_timezone_set('America/Managua'); // Establece tu zona horaria
$fechaHora = date('Y-m-d H:i:s '); 

$fecha_actual = date(format:'y-m-d ',);
$mes_actual = date(format:'m ',);
$dia_actual = date(format:'d ',);
$anio_actual = date(format:'Y ',);

