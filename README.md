<!--
# 📚 Documentación del Proyecto Academia
-->

## 📁 Estructura de Carpetas y Archivos

- **public/**
  - `index.php`: Entrada principal. Redirige todas las peticiones al manejador de rutas.
  - **js/**: Scripts globales y por-vista (ej: `views/test/index.js`).
  - **plugins/**: Librerías externas (Bootstrap, FontAwesome, etc).
  - **views/**: Recursos JS/CSS organizados por vista.

- **routes/**
  - `routes.php`: Rutas personalizadas del sistema.
  - `routes_handle.php`: Manejador central de rutas. Incluye fallback dinámico para rutas tipo `/controlador/accion/param`.

- **controllers/**
  - Controladores de la aplicación. Extienden de `BaseController` y acceden a la base de datos y utilidades globales.

- **app/core/**
  - `BaseController.php`: Renderizador universal de vistas (PHP/Mustache), inyección automática de recursos globales y por-vista, soporte para metadatos desde `views_meta.php`.
  - `DB.php`: Singleton para la conexión a la base de datos.
  - `ModelFactory.php`: Patrón Factory para instanciar modelos.
  - `UsuarioRepository.php`: Patrón Repository para acceso a datos de usuarios.
  - `AuthService.php`: Patrón Service para lógica de autenticación.
  - `helpers.php`: Funciones globales de ayuda (como dd, debuger).

- **config/**
  - `config.php`: Configuración global del sistema (constantes, conexión, helpers).
  - `views_meta.php`: Metadatos de recursos por vista. Permite definir CSS, JS, TS, parciales y vista principal para cada ruta. Soporta recursos globales (`_global`) y bloques inline para configuración especial (ej. Tailwind CDN).

- **database/**
  - `migrations.sql`: Script para crear tablas (migraciones).
  - `seeders.sql`: Script para insertar datos iniciales (seeders).
  - `init_sisgestionescolar.sql`: Orquesta la ejecución de migraciones y seeders.

- **models/**
  - Modelos de la aplicación (pueden ser instanciados con ModelFactory).

- **views/**
  - Vistas del sistema (HTML/PHP/Mustache), organizadas por módulo.
  - Soporta plantillas Mustache (`.mst`) y PHP clásico.

---

## 🏗️ Patrones de Diseño Implementados

- **Singleton:** En `DB.php` para asegurar una sola instancia de conexión a la base de datos.
- **Factory:** En `ModelFactory.php` para instanciar modelos dinámicamente.
- **Repository:** En `UsuarioRepository.php` para centralizar el acceso a datos de usuarios.
- **Service:** En `AuthService.php` para lógica de autenticación y procesos de negocio.

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
- **Soporte para Mustache:** Puedes usar plantillas `.mst` con la variable especial `{{head}}` para inyectar recursos.
- **Soporte para Tailwind, Bootstrap, FontAwesome:** Integración automática desde los metadatos globales.
- **Modo oscuro:** Implementado con Tailwind y JS, persistente en localStorage.
- **Exportar a Excel/PDF:** Utilidades integradas desde PHP y JS.

---

## 💡 Notas y Recomendaciones

- **Configuración de Tailwind CDN:**
  - El bloque `<script>tailwind.config = {...}</script>` debe escribirse manualmente en la plantilla para que el CDN lo reconozca. No funciona si se inyecta dinámicamente desde PHP (limitación del CDN).
  - Ver documentación oficial: https://tailwindcss.com/docs/installation/play-cdn#configuring-tailwind-via-script-tag

- **Recursos globales:**
  - Usa `_global` en `views_meta.php` para definir recursos presentes en todas las vistas.
  - Usa bloques `inline:` para scripts inline especiales.

- **Rutas:**
  - Puedes definir rutas personalizadas en `routes.php` o usar el fallback dinámico para mayor flexibilidad.

- **Escalabilidad:**
  - El sistema está preparado para crecer modularmente, permitiendo agregar nuevos módulos, recursos y utilidades sin duplicar código.

---

## 📋 Historial de Versiones

| Versión  | Fecha         | Día      | Descripción breve                                 |
|----------|--------------|----------|---------------------------------------------------|
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
