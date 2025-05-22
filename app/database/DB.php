<?php

class DB {
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo === null) {
            $servidor = "pgsql:dbname=".BD.";host=".SERVIDOR;
            self::$pdo = new PDO($servidor, USUARIO, PASSWORD);
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
