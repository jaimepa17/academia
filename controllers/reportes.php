<?php

class reportes extends BaseController {
    public function nota($valor = null) {
        $mi_valor = $valor;
        require_once '../views/reports/reporte_general.php';
    }
}
