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
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
            // Ejemplo: 'global.css',
        ],
        'js' => [
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'
        ],
        // 'ts' => [],
        // 'partials' => [
        //     // Ejemplo: 'layout/header.php',
        // ]
    ],
    // Ejemplo para home/index
    'home/index' => [
        'view' => 'home_index.mst', // Ruta de la vista principal
        'css' => ['views/layout/index.css'],
        'js' => [],
        'ts' => [],
        'header' => 'layout/header.mst',
        'footer' => 'layout/footer.mst',
        'partials' => []
    ],
    // Ejemplo para login/index
    'login/index' => [
        'view' => 'login/login_index.php',
        'css' => ['login.css'],
        'js' => ['login.js'],
        'ts' => [],
        'partials' => []
    ],
    // Metadatos para la vista de prueba
    'test/test' => [
        'view' => 'test/index.mst',
        'js' => [
            '/public/views/test/index.js'
        ],
    ],
    // Puedes agregar más vistas aquí
];
