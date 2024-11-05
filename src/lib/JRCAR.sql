-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/11/2024 às 00:58
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

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
-- Estrutura para tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome`, `telefone`, `senha`) VALUES
(1, 'Flávio Gerente', '15997646825', '$2y$10$b.7Qq5vETg2v7pLE8.r5X.gHb2cQTsv3jvg0rVif6CVewwbaiEm.u');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `id_agendamento` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `horario` varchar(15) NOT NULL,
  `veiculo` varchar(15) NOT NULL,
  `status` bit(1) NOT NULL,
  `fk_id_cliente` int NOT NULL,
  `fk_id_servico` int NOT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_id_cliente` (`fk_id_cliente`),
  KEY `fk_id_servico` (`fk_id_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `data`, `horario`, `veiculo`, `status`, `fk_id_cliente`, `fk_id_servico`) VALUES
(153, '2024-11-21', '14:00 - 15:30', 'carro', b'1', 99999, 89),
(152, '0000-00-00', '11:00 - 12:30', 'carro', b'1', 99999, 89),
(151, '2024-11-15', '14:00 - 15:30', 'carro', b'1', 99999, 89),
(150, '2024-10-31', '08:00 - 09:30', 'carro', b'1', 99999, 89),
(149, '0000-00-00', '12:30 - 14:00', 'carro', b'1', 99999, 89),
(148, '2024-10-31', '14:00 - 15:30', 'carro', b'1', 99999, 89),
(147, '2024-10-31', '14:00 - 15:30', '', b'1', 99999, 89),
(154, '2024-10-31', '09:30 - 11:00', 'caminhonete', b'1', 99999, 89),
(155, '2024-12-30', '14:00 - 15:30', 'carro', b'1', 99999, 89),
(156, '0000-00-00', '14:00 - 15:30', 'moto', b'1', 99999, 89),
(157, '0000-00-00', '14:00 - 15:30', 'carro', b'1', 99999, 89);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=100002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `telefone`, `senha`, `endereco`, `foto`) VALUES
(1, 'rhyan', '15996653897', '$2y$10$qybiRju30TmPsaLldiM6zO8o42WPhvMwfLsgKWtdWFPkdhPaD2pi.', 'oi', ''),
(2, 'Fulaninho de Tal', '11111111111', '$2y$10$Er5haKIlkOTuYcWn.O.2TuOqr2FbO.BOSDmxMJAR9MTsW2UjoVMYi', 'bobaerbad', ''),
(99999, 'Flávio Gerente', '15997646825', '$2y$10$sxoOkUqeJPOkgsCiZkNJwuPfmHxT8udObyuTHRaiKDob0J.qG8oNm', 'dd', ''),
(100000, 'Giovanni Francesco Guarnieri', '15991294545', '$2y$10$zotZ1N40gUPv3JAR.4WXX.beTGsSoMAamou/txvXm8sNTVkgpNtp2', 'Rua Professor Giovanni, 12 - Tatuí/SP', ''),
(100001, 'houfindias', '54545455454', '$2y$10$vjwUA9ow8Qful6mZkUdBGOhI3Ti3t464zkLSCLhuNPvpS7gnRNcVa', 'asdasdasdasdasd', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoes`
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
-- Despejando dados para a tabela `informacoes`
--

INSERT INTO `informacoes` (`id_informacoes`, `texto`, `instagram`, `numero`, `endereco`) VALUES
(1, 'A JR Car Wash Estética Automotiva é especializada em cuidar e revitalizar veículos, oferecendo serviços detalhados de lavagem, polimento profissional e higienização interna para manter seu carro impecável.', 'jrcar_wash_', '(15) 99764-6825', 'Rua senador Laurindo minhoto 411, Tatuí, 18271480');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lembrete`
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
-- Estrutura para tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duracao` varchar(50) NOT NULL,
  `imagem1` mediumblob NOT NULL,
  `imagem2` mediumblob NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `servico`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO servico VALUES
(0, "Lavagem Simples", 30.00, "Limpeza básica do veículo que inclui lavagem a seco do exterior, limpeza de tapetes e aplicação de produto para dar brilho aos pneus.", "30min", "", ""),
(0,"Lavagem Completa", 70.00, "Serviço de limpeza detalhada que engloba a lavagem simples, limpeza do painel, aspiração do interior, limpeza dos vidros e aplicação de cera líquida.", "1h 20min", "", ""),
(0,"Lavagem de Motor", 30.00, " Limpeza específica do compartimento do motor seguida da aplicação de cera para proteção e brilho.", "30min", "", ""),
(0,"Polimento de Farol", 120.00, "Processo de polimento para restaurar a clareza dos faróis do veículo, tratando ambos os faróis.", "1h e 30min", "", ""),
(0,"Polimento e Cristal.", 350.00, "Serviço avançado de polimento que inclui a aplicação de uma camada protetora para preservar o brilho e a integridade da pintura.", "1 dia", "", ""),
(0,"Higienização de Banco", 280.00, "Lavagem completa do veículo acompanhada de uma higienização profunda dos bancos, removendo sujeiras e odores. ", "1 dia", "", ""),
(0,"Hig. Banco de Couro", 200.00, " Inclui lavagem completa do veículo, limpeza profunda e aplicação de hidratante específico para manter a qualidade e aparência dos bancos de couro. ", "1 dia", "", ""),
(0,"Higienização de Teto", 100.00, " Limpeza especializada do teto do veículo para remover manchas, sujeiras e odores. ", "1 hora", "", "");



