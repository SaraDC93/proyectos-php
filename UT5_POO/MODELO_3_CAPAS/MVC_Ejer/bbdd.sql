CREATE DATABASE mvc_ejemplo;

USE mvc_ejemplo;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
);

INSERT INTO usuarios (nombre, email) VALUES ('Juan Perez', 'juan@example.com'), ('Maria Lopez', 'maria@example.com');

CREATE USER login IDENTIFIED BY "login";
GRANT ALL ON mvc_ejemplo.* TO login;
