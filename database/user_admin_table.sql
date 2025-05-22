CREATE TABLE usuarios (
    id_usuario SERIAL PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    cargos VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    fyh_creacion TIMESTAMP NULL,
    fyh_actualizacion TIMESTAMP NULL,
    estado VARCHAR(11)
);

INSERT INTO usuarios (nombres,cargos,email,password,fyh_creacion,estado)
VALUES  ('Jonathan Gutierrez','ADMINISTRADOR','admin@admin.com','$2y$10$Ei6k/uxrptBQF6GiVrW9F.gqg7bZcKuvh5RAk7bciHTE7H8EOTj0q','2025-05-20 16:18:10','1');