-- Crear la base de datos
CREATE DATABASE practicafinal;

-- Seleccionar la base de datos
USE practicafinal;

-- Crear la tabla usuario
CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user VARCHAR(50),
    rol ENUM('admin', 'user'),
    pass VARCHAR(50)
);

-- Crear la tabla apuesta
CREATE TABLE interes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT,
    numero VARCHAR(50),
    fecha DATE,
    FOREIGN KEY (id_user) REFERENCES usuario(id)
);

-- Crear la tabla sorteo
CREATE TABLE lugares(
    id INT PRIMARY KEY AUTO_INCREMENT,
    ciudad VARCHAR(50),
);

-- Insertar un usuario
INSERT INTO usuario (user, rol, pass) VALUES ('user', 'user', 'user');

-- Insertar un administrador
INSERT INTO usuario  (user, rol, pass) VALUES ('admin', 'admin', 'admin');

INSERT INTO lugares VALUES (null, 'Albacete');