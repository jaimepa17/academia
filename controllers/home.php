<?php

class home extends BaseController {
    public function index() {
        require_once dirname(__DIR__) . '/views/home_index.php';
    }
}
