-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS sisgestionescolar;

-- Usar la base de datos
USE sisgestionescolar;

-- Crear tabla cargos si no existe
CREATE TABLE IF NOT EXISTS cargos (
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cargo VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

-- Insertar cargo admin solo si no existe
INSERT INTO cargos (nombre_cargo)
SELECT 'admin'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM cargos WHERE nombre_cargo = 'admin');

-- Crear tabla estados_user si no existe
CREATE TABLE IF NOT EXISTS estados_user (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

-- Insertar estados solo si no existen
INSERT INTO estados_user (nombre_estado)
SELECT 'activo' FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'activo');

INSERT INTO estados_user (nombre_estado)
SELECT 'eliminado' FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'eliminado');

-- Crear tabla usuarios si no existe
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    id_cargo INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    fecha_creacion DATE DEFAULT (CURRENT_DATE),
    fecha_actualizacion DATE NULL,
    estado INT,
    FOREIGN KEY (id_cargo) REFERENCES cargos(id_cargo),
    FOREIGN KEY (estado) REFERENCES estados_user(id_estado)
) ENGINE=InnoDB;

-- Insertar usuario admin solo si no existe
INSERT INTO usuarios (nombres, apellidos, id_cargo, email, password, fecha_creacion, estado)
SELECT 'Jonathan', 'Gutierrez', 1, 'admin@admin.com', '123456789', '2025-05-20', 1
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE email = 'admin@admin.com');