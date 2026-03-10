CREATE DATABASE IF NOT EXISTS treinamento;

USE treinamento;

CREATE TABLE IF NOT EXISTS estado (
    id integer PRIMARY KEY NOT NULL,
    sigla text,
    nome text
);

CREATE TABLE IF NOT EXISTS cidade (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    id_estado integer references estado(id)
);

CREATE TABLE IF NOT EXISTS pessoa (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    endereco text,
    bairro text,
    telefone text,
    email text,
    id_cidade integer references cidade(id) 
);


INSERT INTO estado (id, sigla, nome) SELECT 1, 'AC', 'Acre' WHERE NOT EXISTS (SELECT 1 FROM estado WHERE nome = 'Acre');
INSERT INTO cidade (id, nome, id_estado) SELECT 1, 'Rio Branco', 1 WHERE NOT EXISTS (SELECT 1 FROM cidade WHERE nome = 'Rio Branco');