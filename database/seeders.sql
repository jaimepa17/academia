-- SEEDERS: Datos iniciales para cargos
INSERT INTO cargos (nombre_cargo)
SELECT 'admin'
WHERE NOT EXISTS (SELECT 1 FROM cargos WHERE nombre_cargo = 'admin');

-- SEEDERS: Datos iniciales para estados_user
INSERT INTO estados_user (nombre_estado)
SELECT 'activo' WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'activo');
INSERT INTO estados_user (nombre_estado)
SELECT 'eliminado' WHERE NOT EXISTS (SELECT 1 FROM estados_user WHERE nombre_estado = 'eliminado');

-- SEEDERS: Usuario admin
INSERT INTO usuarios (nombres, apellidos, id_cargo, email, password, fecha_creacion, estado)
SELECT 'Jonathan', 'Gutierrez', 1, 'admin@admin.com', '123456789', '2025-05-20', 1
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE email = 'admin@admin.com');
