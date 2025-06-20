<!--
# 📚 Documentación Técnica — Academia
-->

## 📁 Estructura de Carpetas y Archivos

El proyecto sigue una estructura modular y escalable, separando claramente la lógica de negocio, vistas, recursos públicos y configuración.

- **public/** — Archivos accesibles públicamente (CSS, JS, imágenes, plugins externos).
- **routes/** — Definición y manejo centralizado de rutas amigables.
- **controllers/** — Controladores principales, cada uno extiende de `BaseController`.
- **app/core/** — Núcleo del sistema: renderizador universal, helpers, conexión DB.
- **config/** — Configuración global y metadatos de recursos por vista.
- **database/** — Scripts de migración y seeders.
- **models/** — Modelos de datos.
- **views/** — Vistas Mustache (`.mst`) y PHP, organizadas por módulo.

---

## 🏗️ Patrones de Diseño Utilizados

- **MVC clásico:** Separación clara entre Modelos, Vistas y Controladores.
- **Singleton:** En `DB.php` para asegurar una única instancia de conexión a la base de datos.

---

## 🔄 Flujo de Peticiones

1. El usuario accede a cualquier URL (ej: `/home/test/valor`).
2. `.htaccess` redirige todas las peticiones a `routes/routes_handle.php`.
3. `routes_handle.php` resuelve la ruta:
   - Si está en `routes.php`, usa la definición personalizada.
   - Si no, aplica fallback dinámico `/controlador/accion/param`.
4. El controlador ejecuta el método correspondiente y llama a `rendervista()`.
5. `BaseController` busca los metadatos en `views_meta.php`, inyecta recursos globales y por-vista, y renderiza la vista (PHP o Mustache).

---

## 🖼️ Sistema de Vistas y Recursos

- **Metadatos por vista:** Define recursos (CSS, JS, TS, parciales, vista principal) en `config/views_meta.php`.
- **Recursos globales:** Usa la clave `_global` en `views_meta.php` para recursos presentes en todas las vistas.
- **Inyección automática:** El renderizador une recursos globales y por-vista, evitando duplicidad y facilitando la escalabilidad.
- **Soporte para Mustache:** Plantillas `.mst` con la variable especial `{{head}}` para inyectar recursos.
- **Integración de utilidades modernas:** Tailwind, Bootstrap, FontAwesome y otros plugins desde los metadatos globales.
- **Modo oscuro:** Implementado con Tailwind y JS, persistente en localStorage.
- **Exportar a Excel/PDF:** Utilidades integradas desde PHP y JS.

---

## 💡 Notas y Recomendaciones

- **Configuración de Tailwind CDN:**
  - El bloque `<script>tailwind.config = {...}</script>` debe escribirse manualmente en la plantilla para que el CDN lo reconozca.
  - Ver documentación oficial: https://tailwindcss.com/docs/installation/play-cdn#configuring-tailwind-via-script-tag
- **Recursos globales:**
  - Usa `_global` en `views_meta.php` para definir recursos presentes en todas las vistas.
  - Usa bloques `inline:` para scripts inline especiales.
- **Rutas:**
  - Puedes definir rutas personalizadas en `routes.php` o usar el fallback dinámico para mayor flexibilidad.
- **Escalabilidad:**
  - El sistema está preparado para crecer modularmente, permitiendo agregar nuevos módulos, recursos y utilidades sin duplicar código.

---

## 🧑‍💻 Uso del BaseController

El `BaseController` es la clase base para todos los controladores del sistema. Proporciona:

- Acceso a la base de datos mediante `$this->db` (instancia singleton de DB).
- El método `rendervista($vista, $data = [], $metadatos = null)` para renderizar vistas Mustache o PHP, inyectando automáticamente recursos globales y por-vista definidos en `config/views_meta.php`.
- Soporte para inyección de header/footer automáticos, recursos globales, parciales y variables de datos.

**Ejemplo de uso en un controlador:**

```php
class HomeController extends BaseController {
    public function index() {
        $data = ['usuario' => 'Juan'];
        $this->rendervista('home/index', $data);
    }
}
```

---

## 🛠️ Uso de Helpers

Los helpers son funciones globales ubicadas en `app/core/helpers.php` que facilitan tareas comunes como:

- Depuración (`dd($var)`), impresión de variables, formateo de fechas, etc.
- Puedes agregar tus propios helpers según las necesidades del proyecto.

**Ejemplo:**

```php
dd($miVariable); // Detiene la ejecución y muestra el contenido de la variable
```

---

## 🕹️ Uso de Controladores

- Todos los controladores deben extender de `BaseController` para acceder a la base de datos y utilidades globales.
- Los métodos públicos de los controladores corresponden a las acciones accesibles por URL (ej: `/home/index`).
- Utiliza el método `rendervista` para mostrar la vista correspondiente y pasar datos.

**Estructura típica de un controlador:**

```php
class LoginController extends BaseController {
    public function index() {
        $this->rendervista('login/index');
    }
    public function autenticar() {
        // Lógica de autenticación
    }
}
```

---

## 📋 Historial de Versiones

| Versión  | Fecha         | Día      | Descripción breve                                 |
|----------|--------------|----------|---------------------------------------------------|
| v1.0.0   | 20/05/2025    | Martes   | Sistema de rutas centralizado, metadatos por vista, renderizador universal, integración Mustache, estructura base y documentación inicial |
| v1.2.0   | 24/05/2025    | Sábado   | Refactorización de header/footer, recursos globales, rutas locales, mejoras Mustache y documentación |


---

## 🚀 Cambios y Mejoras Recientes

### v1.2.0 - 24/05/2025 (sábado)

- **Redirección inteligente en `index.php`:** Ahora redirige automáticamente a la ruta `/home/index` usando la constante `APP_URL` para compatibilidad con subcarpetas o dominios personalizados.
- **Sistema de header y footer flexible:** Puedes definir `header` y `footer` en los metadatos de cada vista (`views_meta.php`) para que se inyecten automáticamente antes y después del contenido principal, sin necesidad de incluirlos manualmente en la plantilla.
- **Header y footer ultra responsivos:**
  - Header y footer rediseñados con utilidades Bootstrap y CSS personalizado para máxima responsividad y compacidad.
  - Footer ultra compacto, todo en una sola línea visual, con logo, enlaces y redes sociales alineados y centrados.
- **Bootstrap y FontAwesome globales:**
  - Bootstrap y FontAwesome se cargan globalmente desde rutas locales (`/public/plugins/bootstrap/...`) definidas en `_global` de `views_meta.php`.
  - Ya no dependes del CDN para estos recursos.
- **Logo responsivo:** El logo del header se adapta automáticamente a cualquier tamaño de pantalla.
- **Sistema de rutas y renderizado centralizado:**
  - El acceso a `/index.php` redirige al controlador Home y su acción index, aprovechando el sistema de rutas y renderizado universal.
- **Buenas prácticas Mustache:**
  - No se debe incluir archivos `.mst` directamente con `include` en PHP. Siempre renderiza con el motor Mustache o el controlador.
- **Documentación y ejemplos mejorados:**
  - El README y los comentarios en los archivos clave explican cómo agregar recursos globales, por-vista y cómo estructurar las plantillas para máxima flexibilidad.

---

¿Dudas o sugerencias? Consulta la documentación interna o contacta al responsable del proyecto.
