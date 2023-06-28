CREATE DATABASE campuslands

Se camboi el nombrePais que era un INT por un nombrePais VARCHAR}

/*Crear la tabla pais*/
CREATE TABLE pais(idPais INT AUTO_INCREMENT NOT NULL PRIMARY KEY, nombrePais VARCHAR(50) NOT NULL);

/*Crear tabla depertamento*/
CREATE TABLE departamento(idDep INT AUTO_INCREMENT NOT NULL PRIMARY KEY, nombreDep VARCHAR(50) NOT NULL,idPais INT NOT NULL, CONSTRAINT idPais FOREIGN KEY (idPais) REFERENCES pais(idPais));

/*Crear tabla region*/
CREATE TABLE region(idReg INT AUTO_INCREMENT NOT NULL PRIMARY KEY, nombreReg VARCHAR(60) NOT NULL,idDep INT NOT NULL, CONSTRAINT idDep FOREIGN
 KEY (idDep) REFERENCES departamento(idDep));

Se cambia el idCamper de varchar(20)
aun INT AUTO_INCREMENT


/*Se crea la tabla campers*/
CREATE TABLE campers(idCamper INT AUTO_INCREMENT NOT NULL PRIMARY KEY, nombreCamper VARCHAR(50) NOT NULL,apellidoCamper VARCHAR(50),fechaNac DATE,idReg INT NOT NULL, CONSTRAINT idReg FOREIGN KEY (idReg) REFERENCES region(idReg));


INSERT INTO pais (nombrePais)
VALUES ('Francia');

INSERT INTO departamento (idPais,nombreDep) VALUES ('1','normandia');


INSERT INTO region (idDep,nombreReg) VALUES ('1','Santin');


DELETE FROM `pais` WHERE `pais`.`idPais` = 2




Arquitectura:
se descarga el bramus
composer require bramus/router ~1.6

se descarga el vdonet

composer require vlucas/phpdotenv


#Entrar en localhost