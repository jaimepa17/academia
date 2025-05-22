<?php
require_once __DIR__ . '/../database/DB.php';

/**
 * Clase base para todos los controladores
 * @property DB $db Instancia de la clase DB para acceso a la base de datos
 */
class BaseController {
    /** @var DB */
    protected $db;

    public function __construct() {
        // Cargar configuración global solo una vez
        if (!defined('APP_URL')) {
            require_once dirname(__DIR__, 2) . '/config/config.php';
        }
        $this->db = new DB();
    }
    // Aquí puedes agregar más utilidades generales para todos los controladores
}
