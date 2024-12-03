-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Nov-2024 às 22:16
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jrcar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--
CREATE DATABASE IF NOT EXISTS `jrcar`;
USE `jrcar`;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `telefone`, `senha`) VALUES
(1, 'Flávio Gerente', '15997646825', '$2y$10$b.7Qq5vETg2v7pLE8.r5X.gHb2cQTsv3jvg0rVif6CVewwbaiEm.u');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `id_agendamento` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `horario` varchar(15) NOT NULL,
  `veiculo` varchar(15) NOT NULL,
  `status` int NOT NULL,
  `fk_id_cliente` int NOT NULL,
  `fk_id_servico` int NOT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_id_cliente` (`fk_id_cliente`),
  KEY `fk_id_servico` (`fk_id_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=100002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`, `senha`, `endereco`, `foto`) VALUES
(1, 'Flávio Gerente', '15997646825', '$2y$10$sxoOkUqeJPOkgsCiZkNJwuPfmHxT8udObyuTHRaiKDob0J.qG8oNm', 'dd', '../images/upload_clientes/perfil_default.png');


-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

DROP TABLE IF EXISTS `informacoes`;
CREATE TABLE IF NOT EXISTS `informacoes` (
  `id_informacoes` int NOT NULL AUTO_INCREMENT,
  `texto` varchar(255) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  PRIMARY KEY (`id_informacoes`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`id_informacoes`, `texto`, `instagram`, `numero`, `endereco`) VALUES
(1, 'A JR Car Wash Estética Automotiva é especializada em cuidar e revitalizar veículos, oferecendo serviços detalhados de lavagem, polimento profissional e higienização interna para manter seu carro impecável.', 'jrcar_wash_', '(15) 99764-6825', 'Rua senador Laurindo minhoto 411, Tatuí, 18271480');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lembrete`
--

DROP TABLE IF EXISTS `lembrete`;
CREATE TABLE IF NOT EXISTS `lembrete` (
  `id_lembrete` int NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(100) NOT NULL,
  `fk_id_agendamento` int NOT NULL,
  PRIMARY KEY (`id_lembrete`),
  KEY `fk_id_agendamento` (`fk_id_agendamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duracao` varchar(50) NOT NULL,
  `imagem1` varchar(100) NOT NULL,
  `imagem2` varchar(100) NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `nome`, `preco`, `descricao`, `duracao`, `imagem1`, `imagem2`) VALUES
(90, 'Lavagem Simples', '30.00', 'Limpeza básica do veículo que inclui lavagem a seco do exterior, limpeza de tapetes e aplicação de produto para dar brilho aos pneus.', '30min', '../../images/upload_servicos/674b4aa457141_67465e2b226f2_lavagem-simples.png', '../../images/upload_servicos/674b4aa457675_67465e2b228c9_lavagem-simples_2.png'),
(91, 'Lavagem Completa', '70.00', 'Serviço de limpeza detalhada que engloba a lavagem simples, limpeza do painel, aspiração do interior, limpeza dos vidros e aplicação de cera líquida.', '1h 20min', '../../images/upload_servicos/674b4b07c7092_67465e9adaaf9_lavagem-completa.jpg', '../../images/upload_servicos/674b4b07c859c_67465e9adad22_lavagem-completa_2.jpg'),
(92, 'Lavagem de Motor', '30.00', ' Limpeza específica do compartimento do motor seguida da aplicação de cera para proteção e brilho.', '30min', '../../images/upload_servicos/674b4ae6136f1_67465e14a71a6_lavagem-de-motor.png', '../../images/upload_servicos/674b4ae6144b2_67465e14a735f_lavagem-de-motor_2.png'),
(93, 'Polimento de Farol', '120.00', 'Processo de polimento para restaurar a clareza dos faróis do veículo, tratando ambos os faróis.', '1h e 30min', '../../images/upload_servicos/674b4b3e02dc0_67465de5756fd_polimento-de-farol.png', '../../images/upload_servicos/674b4b3e03cfe_67465de5758ab_polimento-de-farol_2.png'),
(94, 'Polimento e Cristal.', '350.00', 'Serviço avançado de polimento que inclui a aplicação de uma camada protetora para preservar o brilho e a integridade da pintura.', '1 dia', '../../images/upload_servicos/674b4b9be0d26_67465ef12d606_polimento-e-cristalizacao.png', '../../images/upload_servicos/674b4b9be121a_67465ef12d80e_polimento-e-cristalizacao_2.png'),
(95, 'Higienização de Banco', '280.00', 'Lavagem completa do veículo acompanhada de uma higienização profunda dos bancos, removendo sujeiras e odores. ', '1 dia', '../../images/upload_servicos/674b4b6eaca89_67461e41336ca_higienizacao-de-banco.png', '../../images/upload_servicos/674b4b6eadefb_67461e41336ce_higienizacao-de-banco_2.png'),
(96, 'Hig. Banco de Couro', '200.00', ' Inclui lavagem completa do veículo, limpeza profunda e aplicação de hidratante específico para manter a qualidade e aparência dos bancos de couro. ', '1 dia', '../../images/upload_servicos/674b4b56e728c_67465ec06808c_higienizacao-de-banco-de-couro.png', '../../images/upload_servicos/674b4b56e8a03_67465ec06827d_higienizacao-de-banco-de-couro_2.png'),
(97, 'Higienização de Teto', '100.00', ' Limpeza especializada do teto do veículo para remover manchas, sujeiras e odores. ', '1 hora', '../../images/upload_servicos/674b4b2009920_67465eb21a222_higienizacao-de-teto.png', '../../images/upload_servicos/674b4b200ae5c_67465eb21a3ef_higienizacao-de-teto_2.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
