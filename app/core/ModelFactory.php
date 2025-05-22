<?php
// Patron Factory para modelos
class ModelFactory {
    public static function create($modelName) {
        $class = ucfirst($modelName);
        $file = __DIR__ . "/../models/{$class}.php";
        if (file_exists($file)) {
            require_once $file;
            if (class_exists($class)) {
                return new $class();
            }
        }
        throw new Exception("Modelo {$class} no encontrado.");
    }
}
