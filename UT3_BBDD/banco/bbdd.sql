CREATE DATABASE banco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE banco;

CREATE TABLE banco (
    id_banco INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL
);

CREATE TABLE cliente (
    dni INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL
);

CREATE TABLE cuenta_bancaria (
    iban VARCHAR (34) PRIMARY KEY,
    entidad VARCHAR(255) NOT NULL,
    dni INT,
    id_banco INT,
    FOREIGN KEY (id_banco) REFERENCES banco(id_banco) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (dni) REFERENCES cliente(dni) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO banco (nombre, direccion) VALUES ("Banco Santander", "Calle Falsa 123");
INSERT INTO banco (nombre, direccion) VALUES ("Banco Popular", "Calle Verdadera 456");
INSERT INTO banco (nombre, direccion) VALUES ("BBVA", "Calle Diagonal 789");