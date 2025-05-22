<?php

class DB {
    private static $pdo = null;
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if (self::$pdo === null) {
            $servidor = "pgsql:dbname=".BD.";host=".SERVIDOR;
            self::$pdo = new PDO($servidor, USUARIO, PASSWORD);
        }
        return self::$pdo;
    }

    public static function select($sql, $params = []) {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Puedes agregar más métodos como insert, update, delete si lo necesitas
}
