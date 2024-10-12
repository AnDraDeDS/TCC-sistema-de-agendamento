CREATE DATABASE IF NOT EXISTS JRCAR;
USE JRCAR;



DROP TABLE IF EXISTS cliente;
CREATE TABLE  IF NOT EXISTS cliente(
    id_cliente INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_cliente)
);

DROP TABLE IF EXISTS agendamento;
CREATE TABLE IF NOT EXISTS agendamento(
    id_agendamento INT AUTO_INCREMENT NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    status BIT(1) NOT NULL,
    fk_id_cliente INT NOT NULL,
    fk_id_servico INT NOT NULL,
    PRIMARY KEY(id_agendamento),
    FOREIGN KEY (fk_id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY (fk_id_servico) REFERENCES servico(id_servico)
);

DROP TABLE IF EXISTS lembrete;
CREATE TABLE IF NOT EXISTS lembrete(
  id_lembrete INT AUTO_INCREMENT NOT NULL,
  conteudo VARCHAR(100) NOT NULL,
  fk_id_agendamento INT NOT NULL,
  PRIMARY KEY(id_lembrete),
  FOREIGN KEY(fk_id_agendamento) REFERENCES agendamento(id_agendamento)
);

DROP TABLE IF EXISTS admin;
CREATE TABLE IF NOT EXISTS admin(
    id_admin INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone INT(20) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_admin)
);

DROP TABLE IF EXISTS informacoes;
CREATE TABLE  IF NOT EXISTS informacoes(
    id_informacoes INT AUTO_INCREMENT NOT NULL,
    texto VARCHAR(100) NOT NULL,
    instagram VARCHAR(50) NOT NULL,
    numero INT NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_informacoes)
);

DROP TABLE IF EXISTS servicos;
CREATE TABLE IF NOT EXISTS servico(
    id_servico INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    preco DECIMAL(5,2) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    duracao VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_servico)
);







