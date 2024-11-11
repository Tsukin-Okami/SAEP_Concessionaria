-- DATABASE CREATION

CREATE DATABASE concessionaria;
use concessionaria;

-- CONSTRUCTORS

CREATE TABLE concessionaria (
	id int(11) AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL
);

CREATE TABLE area (
	id int(11) PRIMARY KEY
);

CREATE TABLE automovel (
	id int(11) AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL,
    preco float NOT NULL,
    area_id int(11),
    concessionaria_id int(11),
    FOREIGN KEY (area_id) REFERENCES area(id),
    FOREIGN KEY (concessionaria_id) REFERENCES concessionaria(id)
);

CREATE TABLE cliente (
	id int(11) AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50) NOT NULL,
    sobrenome varchar (50) NOT NULL,
    cpf bigint(11) NOT NULL
);

CREATE TABLE venda (
	id int(11) AUTO_INCREMENT PRIMARY KEY,
    data timestamp NOT NULL,
    cliente_id int(11) NOT NULL,
    automovel_id int(11) NOT NULL,
    preco float NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (automovel_id) REFERENCES automovel(id)
);
