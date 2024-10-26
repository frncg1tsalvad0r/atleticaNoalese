DROP DATABASE IF EXISTS atleticaNoalese;
CREATE DATABASE atleticaNoalese;
USE atleticaNoalese;

CREATE TABLE atleti (
    ID INT AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    numeroTessera INT NOT NULL,
    sesso enum ('M', 'F') NOT NULL,
    categoria enum ('esordiente', 
    'ragazzo', 
    'cadetto', 'allievo', 
    'juniores', 'promessa', 
    'senior') NOT NULL,
    dataNascita DATE NOT NULL,
    registrato BOOLEAN,
    PRIMARY KEY(ID),
    UNIQUE(numeroTessera)
);

INSERT INTO atleti VALUES(1, 'Mario', 'Rossi', 1000, 'M', 'allievo', '2000-01-05', true);
INSERT INTO atleti VALUES(2, 'Anna', 'Milana', 1001, 'F', 'allievo', '2001-03-05', false);