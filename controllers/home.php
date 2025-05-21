<?php
include_once dirname(__DIR__) . '/app/sesion.php';
class home {
    public function index() {
        require_once '../views/index.php';
    }
}
