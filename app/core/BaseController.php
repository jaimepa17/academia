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
        // Usar el Singleton correctamente
        $this->db = DB::getInstance();
    }
    // Aquí puedes agregar más utilidades generales para todos los controladores

    // Renderizador de vistas inteligente
    protected function rendervista($vista, $data = [], $metadatos = null) {
        // Cargar metadatos globales si no se pasan manualmente
        $metaConfig = require dirname(__DIR__, 2) . '/config/views_meta.php';
        $metaKey = str_replace(['\\', '/'], ['/', '/'], $vista);
        $globalMeta = $metaConfig['_global'] ?? [];
        if ($metadatos === null) {
            $metadatos = $metaConfig[$metaKey] ?? [];
        }
        // Extraer y fusionar recursos (los de la vista sobrescriben los globales si hay conflicto)
        $css = array_merge($globalMeta['css'] ?? [], $metadatos['css'] ?? []);
        $js = array_merge($globalMeta['js'] ?? [], $metadatos['js'] ?? []);
        $ts = array_merge($globalMeta['ts'] ?? [], $metadatos['ts'] ?? []);
        $partials = array_merge($globalMeta['partials'] ?? [], $metadatos['partials'] ?? []);
        $viewFile = $metadatos['view'] ?? null;

        // NUEVO: Renderizar header si está definido
        if (!empty($metadatos['header'])) {
            $headerPath = dirname(__DIR__, 2) . '/views/' . ltrim($metadatos['header'], '/');
            if (file_exists($headerPath)) {
                include $headerPath;
            }
        }

        // Determinar la ruta y extensión de la vista
        if ($viewFile) {
            $viewPath = dirname(__DIR__, 2) . '/views/' . ltrim($viewFile, '/');
        } else {
            $viewPath = dirname(__DIR__, 2) . '/views/' . $vista . '.php';
        }
        // Recursos globales (siempre presentes)
        $globalCss = [
            // 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        ];
        $globalJs = [
            // 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        ];
        // Unir recursos globales con los de views_meta
        $css = array_merge($globalCss, $css);
        $js = array_merge($globalJs, $js);
        // Inyección de recursos (head)
        $head = "<head>\n";
        foreach ($css as $cssFile) {
            if (preg_match('/^https?:\/\//', $cssFile)) {
                $head .= '<link rel="stylesheet" href="' . $cssFile . '">' . "\n";
            } elseif (strpos($cssFile, '/public/') === 0) {
                $head .= '<link rel="stylesheet" href="' . APP_URL . $cssFile . '">' . "\n";
            } elseif (strpos($cssFile, '/') === 0) {
                $head .= '<link rel="stylesheet" href="' . $cssFile . '">' . "\n";
            } else {
                $head .= '<link rel="stylesheet" href="' . APP_URL . '/public/css/' . $cssFile . '">' . "\n";
            }
        }
        foreach ($js as $jsFile) {
            if (strpos($jsFile, 'inlinefile:') === 0) {
                $inlineFileRel = ltrim(str_replace(['./', '\\'], ['', '/'], substr($jsFile, 10)), ':/');
                $inlineFilePath = dirname(__DIR__, 2) . '/' . $inlineFileRel;
                if (file_exists($inlineFilePath)) {
                    $scriptContent = trim(file_get_contents($inlineFilePath));
                    $head .= "<!-- INICIO $inlineFileRel inline -->\n";
                    $head .= '<script>' . $scriptContent . '</script>' . "\n";
                    $head .= "<!-- FIN $inlineFileRel inline -->\n";
                } else {
                    $head .= "<!-- ERROR: No se encontró $inlineFileRel para inlinefile -->\n";
                }
            } elseif (strpos($jsFile, 'inline:') === 0) {
                $head .= '<script>' . substr($jsFile, 7) . '</script>' . "\n";
            } elseif (preg_match('/^https?:\/\//', $jsFile)) {
                $head .= '<script src="' . $jsFile . '"></script>' . "\n";
            } elseif (strpos($jsFile, '/public/') === 0) {
                $head .= '<script src="' . APP_URL . $jsFile . '"></script>' . "\n";
            } elseif (strpos($jsFile, '/') === 0) {
                $head .= '<script src="' . $jsFile . '"></script>' . "\n";
            } else {
                $head .= '<script src="' . APP_URL . '/public/js/' . ltrim($jsFile, '/') . '"></script>' . "\n";
            }
        }
        foreach ($ts as $tsFile) {
            $head .= '<script type="text/typescript" src="' . APP_URL . '/public/ts/' . $tsFile . '"></script>' . "\n";
        }
        $head .= "</head>\n";
        // Renderizar según extensión
        $ext = strtolower(pathinfo($viewPath, PATHINFO_EXTENSION));
        if ($ext === 'mst') {
            // Mustache
            require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
            $mustache = new \Mustache_Engine([
                'loader' => new \Mustache_Loader_FilesystemLoader(dirname(__DIR__, 2) . '/views', ['extension' => '.mst'])
            ]);
            // Inyectar el head en la variable especial {{head}}
            $data['head'] = $head;
            // Renderizar el contenido principal
            echo $mustache->render(str_replace(['.mst', '.mustache'], '', ltrim($viewFile ?: $vista, '/')), $data);
        } elseif ($ext === 'php') {
            // PHP clásico
            extract($data);
            echo $head;
            include $viewPath;
        } else {
            echo "<b>Vista no encontrada o extensión no soportada:</b> $viewPath";
        }

        // NUEVO: Renderizar footer si está definido
        if (!empty($metadatos['footer'])) {
            $footerPath = dirname(__DIR__, 2) . '/views/' . ltrim($metadatos['footer'], '/');
            if (file_exists($footerPath)) {
                include $footerPath;
            }
        }
    }
}
