-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Dez-2020 às 01:12
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `meualuno`
--
CREATE DATABASE IF NOT EXISTS `meualuno` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `meualuno`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE IF NOT EXISTS `acesso` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `dt_acesso` date DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacao`
--

CREATE TABLE IF NOT EXISTS `anotacao` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `notas` longtext,
  `id_usuario` int(11) NOT NULL,
  `id_conteudo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_anotacao_tb_usuario1_idx` (`id_usuario`),
  KEY `fk_anotacao_tb_conteudo1_idx` (`id_conteudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_destino` int(11) DEFAULT NULL,
  `mensagem` longtext,
  `status` varchar(45) DEFAULT NULL,
  `id_origem` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_chat_tb_usuario1_idx` (`id_origem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Mensagem` longtext,
  `cod` int(11) DEFAULT NULL,
  `assunto` text NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_feedback_tb_usuario1_idx` (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_anexo`
--

CREATE TABLE IF NOT EXISTS `tb_anexo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `anexo` varchar(255) DEFAULT NULL,
  `id_conteudo` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_tb_anexo_tb_conteudo1_idx` (`id_conteudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudo`
--

CREATE TABLE IF NOT EXISTS `tb_conteudo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` longtext,
  `dt_publicacao` date DEFAULT NULL,
  `id_materia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nm_usuario` text NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_tb_conteudo_tb_materia1_idx` (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materia`
--

CREATE TABLE IF NOT EXISTS `tb_materia` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tag`
--

CREATE TABLE IF NOT EXISTS `tb_tag` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `id_conteudo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `descricao` longtext,
  `dt_nascimento` date DEFAULT NULL,
  `dt_conclusao` date DEFAULT NULL,
  `ref_instituicao` varchar(255) DEFAULT NULL,
  `certificado` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anotacao`
--
ALTER TABLE `anotacao`
  ADD CONSTRAINT `fk_anotacao_tb_conteudo1` FOREIGN KEY (`id_conteudo`) REFERENCES `tb_conteudo` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_anotacao_tb_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_tb_usuario1` FOREIGN KEY (`id_origem`) REFERENCES `tb_usuario` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_tb_usuario1` FOREIGN KEY (`cod`) REFERENCES `tb_usuario` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_anexo`
--
ALTER TABLE `tb_anexo`
  ADD CONSTRAINT `fk_tb_anexo_tb_conteudo1` FOREIGN KEY (`id_conteudo`) REFERENCES `tb_conteudo` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_conteudo`
--
ALTER TABLE `tb_conteudo`
  ADD CONSTRAINT `fk_tb_conteudo_tb_materia1` FOREIGN KEY (`id_materia`) REFERENCES `tb_materia` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
