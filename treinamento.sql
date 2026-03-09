CREATE TABLE estado (
    id integer PRIMARY KEY NOT NULL,
    sigla text,
    nome text
);

CREATE TABLE cidade (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    id_estado integer references estado(id)
);

CREATE TABLE pessoa (
    id integer PRIMARY KEY NOT NULL,
    nome text,
    endereco text,
    bairro text,
    telefone text,
    email text,
    id_cidade integer references cidade(id) 
);