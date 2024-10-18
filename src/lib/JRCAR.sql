CREATE DATABASE IF NOT EXISTS JRCAR;
USE JRCAR;

DROP TABLE IF EXISTS cliente;
CREATE TABLE  IF NOT EXISTS cliente(
    id_cliente INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    foto BLOB NOT NULL,
    PRIMARY KEY(id_cliente)
);

DROP TABLE IF EXISTS agendamento;
CREATE TABLE IF NOT EXISTS agendamento(
    id_agendamento INT AUTO_INCREMENT NOT NULL,
    data VARCHAR(10) NOT NULL,
    horario VARCHAR(15) NOT NULL,
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
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_admin)
);

DROP TABLE IF EXISTS informacoes;
CREATE TABLE  IF NOT EXISTS informacoes(
    id_informacoes INT AUTO_INCREMENT NOT NULL,
    texto VARCHAR(255) NOT NULL,
    instagram VARCHAR(50) NOT NULL,
    numero VARCHAR(15) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_informacoes)
);

DROP TABLE IF EXISTS servico;
CREATE TABLE IF NOT EXISTS servico(
    id_servico INT AUTO_INCREMENT NOT NULL,
    nome VARCHAR(50) NOT NULL,
    preco DECIMAL(5,2) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    duracao VARCHAR(50) NOT NULL,
    imagem1 BLOB NOT NULL,
    imagem2 BLOB NOT NULL,
    PRIMARY KEY(id_servico)
);


INSERT INTO servico VALUES
(0, "Lavagem Simples", 30.00, "Limpeza básica do veículo que inclui lavagem a seco do exterior, limpeza de tapetes e aplicação de produto para dar brilho aos pneus.", ""),
(0,"Polimento de Farol", 120.00, "Processo de polimento para restaurar a clareza dos faróis do veículo, tratando ambos os faróis.", ""),
(0,"Polimento e Cristal.", 350.00, "Serviço avançado de polimento que inclui a aplicação de uma camada protetora para preservar o brilho e a integridade da pintura.", ""),
(0,"Lavagem de Motor", 30.00, " Limpeza específica do compartimento do motor seguida da aplicação de cera para proteção e brilho.", ""),
(0,"Lavagem Completa", 70.00, "Serviço de limpeza detalhada que engloba a lavagem simples, limpeza do painel, aspiração do interior, limpeza dos vidros e aplicação de cera líquida.", ""),
(0,"Hig. Banco de Couro", 200.00, " Inclui lavagem completa do veículo, limpeza profunda e aplicação de hidratante específico para manter a qualidade e aparência dos bancos de couro. ", ""),
(0,"Higienização de Teto", 100.00, " Limpeza especializada do teto do veículo para remover manchas, sujeiras e odores. ", ""),
(0,"Higienização de Banco", 280.00, "Lavagem completa do veículo acompanhada de uma higienização profunda dos bancos, removendo sujeiras e odores. ", "");

INSERT INTO informacoes VALUES
(0, "A JR Car Wash Estética Automotiva é especializada em cuidar e revitalizar veículos, oferecendo serviços detalhados de lavagem, polimento profissional e higienização interna para manter seu carro impecável.", "jrcar_wash_","15 997646825","Rua senador Laurindo minhoto 411, Tatuí, 18271480");

INSERT INTO admin VALUES(0, "Flávio Costa e Silva Júnior", "15997646825", "$2y$10$b.7Qq5vETg2v7pLE8.r5X.gHb2cQTsv3jvg0rVif6CVewwbaiEm.u");




