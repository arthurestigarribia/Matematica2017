CREATE DATABASE usuarios;

-- Criar tabelas no database usuarios
CREATE TABLE IF NOT EXISTS usuarios(
    id SERIAL NOT NULL PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(32)
);

CREATE TABLE IF NOT EXISTS calculos(
    id SERIAL NOT NULL PRIMARY KEY,
    id_usuario INTEGER REFERENCES usuarios(id),
    categoria VARCHAR(100),
    dado1 VARCHAR(100),
    dado2 VARCHAR(100),
    dado3 VARCHAR(100),
    dado4 VARCHAR(100),
    resultados VARCHAR(1000)
);
