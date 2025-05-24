<?php
// Metadatos de vistas: define recursos asociados a cada vista
// Puedes asociar varios CSS, JS, TS (TypeScript) y plantillas parciales


// NOTA IMPORTANTE:
// El CDN de Tailwind solo reconoce la configuración si el bloque
// <script>tailwind.config = {...}</script> se escribe manualmente en la plantilla.
// No funciona si se inyecta dinámicamente desde PHP por encoding/contexto.
// Ver: https://tailwindcss.com/docs/installation/play-cdn#configuring-tailwind-via-script-tag


return [
    // Recursos globales para todas las vistas
    '_global' => [
        'css' => [
            // Ejemplo: 'global.css',
        ],
        'js' => [
            'https://cdn.tailwindcss.com',
        ],
        'ts' => [],
        'partials' => [
            // Ejemplo: 'layout/header.php',
        ]
    ],
    // Ejemplo para home/index
    'home/index' => [
        'css' => ['home.css', 'extra.css'],
        'js' => ['home.js'],
        'ts' => ['home.ts'],
        'partials' => ['layout/parte1.php', 'layout/parte2.php']
    ],
    // Ejemplo para login/index
    'login/index' => [
        'css' => ['login.css'],
        'js' => ['login.js'],
        'ts' => [],
        'partials' => []
    ],
    // Metadatos para la vista de prueba
    'test/test' => [
        'view' => 'test/index.mst',
        'css' => [],
        'js' => [
            '/public/views/test/index.js'
        ],
        'ts' => [],
        'partials' => []
    ],
    // Puedes agregar más vistas aquí
];
