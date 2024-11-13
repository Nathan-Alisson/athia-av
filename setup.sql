CREATE DATABASE IF NOT EXISTS athia;

USE athia;

CREATE TABLE IF NOT EXISTS empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    razao_social VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(150),
    cnpj VARCHAR(18) UNIQUE
);

CREATE TABLE IF NOT EXISTS setor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS empresa_setor (
    empresa_id INT,
    setor_id INT,
    PRIMARY KEY (empresa_id, setor_id),
    FOREIGN KEY (empresa_id) REFERENCES empresa(id) ON DELETE CASCADE,
    FOREIGN KEY (setor_id) REFERENCES setor(id) ON DELETE CASCADE
);
