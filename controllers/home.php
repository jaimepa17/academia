<?php

class home extends BaseController {
    public function index() {
        $this->rendervista('home/index');
    }
    public function test($valor = null) {
        $data = [
            ['numero' => 1, 'valor' => 'Uno'],
            ['numero' => 2, 'valor' => 'Dos'],
            ['numero' => 3, 'valor' => 'Tres'],
            ['numero' => 4, 'valor' => 'Cuatro'],
            ['numero' => 5, 'valor' => 'Cinco'],
            ['numero' => 6, 'valor' => 'Seis'],
            ['numero' => 7, 'valor' => 'Siete'],
            ['numero' => 8, 'valor' => 'Ocho'],
            ['numero' => 9, 'valor' => 'Nueve'],
            ['numero' => 10, 'valor' => 'Diez'],
            ['numero' => 11, 'valor' => 'Once'],
            ['numero' => 12, 'valor' => 'Doce'],
            ['numero' => 13, 'valor' => 'Trece'],
            ['numero' => 14, 'valor' => 'Catorce'],
            ['numero' => 15, 'valor' => 'Quince'],
            ['numero' => 16, 'valor' => 'Dieciseis'],
            ['numero' => 17, 'valor' => 'Diecisiete'],
            ['numero' => 18, 'valor' => 'Dieciocho'],
            ['numero' => 19, 'valor' => 'Diecinueve'],
            ['numero' => 20, 'valor' => 'Veinte']
        ];
        $this->rendervista('test/test', ['valor' => $valor, 'datos' => $data]);
    }

}
