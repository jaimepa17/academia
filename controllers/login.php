<?php
require_once dirname(__DIR__) . '/config.php';

class login {
    public function index($params = []) {
        require_once dirname(__DIR__) . '/views/login/index.php';
    }
    // Puedes agregar aquí el método logout si lo necesitas
}
