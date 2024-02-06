-- Crear la base de datos
CREATE DATABASE examen2023;

-- Seleccionar la base de datos
USE examen2023;

-- Crear la tabla usuario
CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50),
    rol ENUM('admin', 'user'),
    contrasena VARCHAR(50)
);

-- Crear la tabla apuesta
CREATE TABLE apuesta(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    numero VARCHAR(50),
    fecha DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

-- Crear la tabla sorteo
CREATE TABLE sorteo(
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_sorteo VARCHAR(50),
    fecha DATE
);

-- Insertar un usuario
INSERT INTO usuario (nombre_usuario, rol, contrasena) VALUES ('user', 'user', 'user');

-- Insertar un administrador
INSERT INTO usuario (nombre_usuario, rol, contrasena) VALUES ('admin', 'admin', 'admin');