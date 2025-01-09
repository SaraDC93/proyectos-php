CREATE DATABASE bizcochitos CHARACTER SET utf8mb4_unicode_ci;
USE bizcochitos;

--tabla
CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,

