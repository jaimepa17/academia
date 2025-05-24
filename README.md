# Documentación del Proyecto Academia

## Estructura de Carpetas y Archivos

- **public/**
  - Contiene los archivos públicos y de entrada del sistema (index.php). Ahora, index.php solo redirige todas las peticiones al manejador de rutas principal.

- **routes/**
  - `routes.php`: Define las rutas personalizadas del sistema.
  - `routes_handle.php`: Manejador central de rutas. Recibe todas las peticiones, resuelve la ruta y ejecuta el controlador y acción correspondiente.

- **controllers/**
  - Controladores de la aplicación. Cada controlador extiende de `BaseController` y tiene acceso a la base de datos y utilidades globales.

- **app/core/**
  - `BaseController.php`: Clase base para todos los controladores. Carga la configuración global y utilidades.
  - `DB.php`: Clase Singleton para la conexión a la base de datos.
  - `ModelFactory.php`: Implementa el patrón Factory para instanciar modelos.
  - `UsuarioRepository.php`: Ejemplo de patrón Repository para acceso a datos de usuarios.
  - `AuthService.php`: Ejemplo de patrón Service para lógica de autenticación.
  - `helpers.php`: Funciones globales de ayuda (como dd, debuger).

- **app/database/**
  - `DB.php`: Clase de conexión a la base de datos (Singleton).

- **config/**
  - `config.php`: Configuración global del sistema (constantes, conexión, carga de helpers y core).

- **database/**
  - `migrations.sql`: Script para crear tablas (migraciones).
  - `seeders.sql`: Script para insertar datos iniciales (seeders).
  - `init_sisgestionescolar.sql`: Orquesta la ejecución de migraciones y seeders.

- **models/**
  - Modelos de la aplicación (pueden ser instanciados con ModelFactory).

- **views/**
  - Vistas del sistema (HTML/PHP), organizadas por módulo.

## Patrones de Diseño Implementados

- **Singleton:** En `DB.php` para asegurar una sola instancia de conexión a la base de datos.
- **Factory:** En `ModelFactory.php` para instanciar modelos dinámicamente.
- **Repository:** En `UsuarioRepository.php` para centralizar el acceso a datos de usuarios.
- **Service:** En `AuthService.php` para lógica de autenticación y procesos de negocio.

## Flujo de Peticiones

1. El usuario accede a `public/index.php`.
2. `index.php` redirige a `routes/routes_handle.php`.
3. `routes_handle.php` resuelve la ruta y ejecuta el controlador y acción correspondiente.
4. Los controladores extienden de `BaseController` y tienen acceso a la base de datos y utilidades globales.

## Utilidades Globales

- Funciones como `dd()` y `debuger()` están disponibles en todo el sistema.
- La configuración y helpers se cargan automáticamente desde `config/config.php`.

---

Para agregar nuevos controladores, modelos o servicios, sigue la estructura y patrones definidos para mantener el proyecto organizado y escalable.
