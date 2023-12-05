drop database if exists jugadores;
create database jugadores;
drop user if exists jugadores;
create user jugadores identified by 'jugadores';
use banco;
grant all on jugadores.* to jugadores;
--
CREATE TABLE jugadores (
  nombre VARCHAR(75) NOT NULL,
  posicion VARCHAR(20), 
  dni CHAR(9) primary key,
  nacimiento DATE,
  sueldo FLOAT,
  dorsal NUMBER
) engine =innodb;
--
INSERT INTO jugadores VALUES ('Jordi Guisado Trujillo', 'Portero', '91782240G', '2016-06-15', 2345.23, 6);
INSERT INTO jugadores VALUES ('Antonio Carbonell Torres', 'Lateral','81878163A', '2015-06-15', 654.98, 8);
INSERT INTO jugadores VALUES ('Iñaki Morilla Gonzalez', 'Centro','69728026F', '2014-06-15', 7654.56, 7);
INSERT INTO jugadores VALUES ('Francisco Uriarte Cuesta', 'Defensa','83149834G', '2013-06-15', 23575.65, 21);
INSERT INTO jugadores VALUES ('Santiago Calvo Frias', 'Delantero','95314450N', '2012-06-15', 3456.67, 22);

--
