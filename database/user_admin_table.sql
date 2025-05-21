CREATE TABLE usuarios (
    id_usuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    cargos VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR(11)

)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,cargos,email,password,fyh_creacion,estado)
VALUES  ('Jonathan Gutierrez','ADMINISTRADOR','admin@admin.com','$2y$10$Ei6k/uxrptBQF6GiVrW9F.gqg7bZcKuvh5RAk7bciHTE7H8EOTj0q','2025-20-5 16:18:10','1');