-- MIGRACIONES: Estructura de tablas
-- cargos.sql
CREATE TABLE IF NOT EXISTS cargos (
    id_cargo SERIAL PRIMARY KEY,
    nombre_cargo VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

-- estados_user.sql
CREATE TABLE IF NOT EXISTS estados_user (
    id_estado SERIAL PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

-- usuarios.sql
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
