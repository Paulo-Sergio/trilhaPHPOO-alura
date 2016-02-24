-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2016 às 23:25
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loja-php-oo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'esporte'),
(2, 'escolar'),
(3, 'mobilidade'),
(4, 'guloseimas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `categoria_id` int(11) DEFAULT NULL,
  `usado` tinyint(1) DEFAULT '0',
  `isbn` varchar(255) DEFAULT NULL,
  `tipoProduto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `categoria_id`, `usado`, `isbn`, `tipoProduto`) VALUES
(12, 'bola', '20.00', 'bola usada', 1, 1, NULL, 'LivroFisico'),
(14, 'Caderno', '15.00', 'caderno escolar', 2, 0, NULL, 'LivroFisico'),
(18, 'biscoito', '3.00', 'biscoito gostosoo', 4, 0, NULL, 'LivroFisico'),
(19, 'carro', '25000.00', 'carro louco', 3, 1, NULL, 'LivroFisico'),
(20, 'bike', '900.00', 'bike show', 3, 1, NULL, 'LivroFisico'),
(23, 'livro de php', '69.00', 'livro da casa do codigo sobre php', 2, 0, NULL, 'LivroFisico'),
(26, 'livro da casa do codigo de OO', '55.00', 'livro da casa do codigo', 2, 0, '546789', 'LivroFisico'),
(29, 'teste 150', '150.00', 'teste 150 descricao', 3, 1, NULL, 'LivroFisico'),
(30, 'Livro de java', '160.00', 'livro java CDC', 2, 0, '456789', 'LivroFisico'),
(31, 'livro de c#', '125.00', 'livro casa do codigo', 2, 0, '457841', 'Ebook');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'paulo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
