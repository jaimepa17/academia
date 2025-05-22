-- Script seguro para crear la base de datos y tablas solo si no existen
-- Crear base de datos si no existe
DO $$
BEGIN
   IF NOT EXISTS (SELECT FROM pg_database WHERE datname = 'sisgestionescolar') THEN
      PERFORM dblink_exec('dbname=' || current_database(), 'CREATE DATABASE sisgestionescolar');
   END IF;
END$$;

-- Conectarse a la base de datos
\c sisgestionescolar;

-- Este archivo orquesta la ejecución de migraciones y seeders
\i migrations.sql
\i seeders.sql

-- Crear tabla cargos si no existe
CREATE TABLE IF NOT EXISTS cargos (
    id_cargo SERIAL PRIMARY KEY,
    nombre_cargo VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

-- Insertar cargo admin solo si no existe
INSERT INTO cargos (nombre_cargo)
SELECT 'admin'
WHERE NOT EXISTS (SELECT 1 FROM cargos WHERE nombre_cargo = 'admin');

-- Crear tabla estados_user si no existe
CREATE TABLE IF NOT EXISTS estados_user (
    id_estado SERIAL PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

-- Insertar estados solo si no existen
INSERT INTO estados_user (nombre_estado)
SELECT 'activo' WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'activo');
INSERT INTO estados_user (nombre_estado)
SELECT 'eliminado' WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'eliminado');

-- Crear tabla usuarios si no existe
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario SERIAL PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    id_cargo INTEGER NOT NULL REFERENCES cargos(id_cargo),
    email VARCHAR(255) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    fecha_creacion DATE DEFAULT NOW(),
    fecha_actualizacion DATE,
    estado INTEGER REFERENCES estados_user(id_estado)
);

-- Insertar usuario admin solo si no existe
INSERT INTO usuarios (nombres, apellidos, id_cargo, email, password, fecha_creacion, estado)
SELECT 'Jonathan', 'Gutierrez', 1, 'admin@admin.com', '123456789', '2025-05-20', 1
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE email = 'admin@admin.com');
