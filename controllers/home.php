<?php

class home extends BaseController {
    public function index() {
        $this->rendervista('home/index');
    }
    public function test($valor = null) {
        $data = [
            ['numero' => 1, 'valor' => 'Tuani'],
            ['numero' => 2, 'valor' => 'Tuani2'],
            ['numero' => 3, 'valor' => 'Tuani3'],
            ['numero' => 4, 'valor' => 'Tuani4'],
        ];

        
        $this->rendervista('test/test', ['valor' => $valor, 'datos' => $data,
            'usuario' => [
                'id' => 1,
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'email' => 'juan.perez@example.com'
            ]
        ]);
    }

}
