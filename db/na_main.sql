-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Nov-2014 às 17:20
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `na_main`
--
CREATE DATABASE IF NOT EXISTS `na_main` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `na_main`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `esportes`
--

CREATE TABLE IF NOT EXISTS `esportes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `qtdParticipantes` int(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `esportes`
--

INSERT INTO `esportes` (`ID`, `nome`, `qtdParticipantes`) VALUES
(1, 'Natacao', 5),
(2, 'Golf', 5),
(3, 'Corrida', 2),
(4, 'Volei', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE IF NOT EXISTS `filmes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(4) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `nome` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`ID`, `ano`, `tipo`, `tema`, `nome`) VALUES
(3, 2000, 'Comédia', 'Aventura', 'Jumanji'),
(4, 2002, 'Action', 'Spy', 'The Bourne Identity'),
(5, 2012, 'Aventura', 'Fantasia', 'O Hobbit'),
(6, 2014, 'Aventura', 'Sci-Fi', 'Guardiões da Galáxia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE IF NOT EXISTS `jogos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `tipoJogo` varchar(50) NOT NULL,
  `qtdParticipantes` int(30) NOT NULL,
  `temaJogo` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`ID`, `nome`, `tipoJogo`, `qtdParticipantes`, `temaJogo`) VALUES
(1, 'Skyrim', 'RPG', 1, 'Medieval'),
(2, 'Sword Art', 'RPG', 2, 'Technology'),
(3, 'SpeedRunners', 'Corrida', 4, 'Corrida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outros`
--

CREATE TABLE IF NOT EXISTS `outros` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `dadosAdicionais` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `outros`
--

INSERT INTO `outros` (`ID`, `nome`, `dadosAdicionais`) VALUES
(1, 'Tim Minchin', 'Músico/Comediante'),
(2, 'B. B. King', 'Músico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dataNasc` date NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `numeroCelular` char(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `password`, `salt`, `email`, `nome`, `estado`, `cidade`, `pais`, `dataNasc`, `sexo`, `numeroCelular`) VALUES
(1, '00701d7d9310bbaa3b030979ad0d827a81065eba8f719f2480aaf6ec1b9a3e66', '37a20f5d540a393e', 'alehstk@gmail.com', 'Alexandre Maros', 'SC', 'Rio Negrinho', '', '1995-01-01', 'M', '4792318900'),
(2, '9aaf76b3280d2319f719871b7056c2c71ab11ad49aa1c8adbe877228034c7747', '63b0054cac29f78', 'grott.aurelio@gmail.com', 'Aurelio Grott Neto', 'SC', 'Laguna', '', '1995-05-05', 'M', '+554899617317');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioesportes`
--

CREATE TABLE IF NOT EXISTS `usuarioesportes` (
  `IDUsuario` int(11) NOT NULL,
  `IDEsporte` int(11) NOT NULL,
  PRIMARY KEY (`IDUsuario`,`IDEsporte`),
  KEY `IDEsporte` (`IDEsporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarioesportes`
--

INSERT INTO `usuarioesportes` (`IDUsuario`, `IDEsporte`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariofilmes`
--

CREATE TABLE IF NOT EXISTS `usuariofilmes` (
  `IDUsuario` int(11) NOT NULL,
  `IDFilme` int(11) NOT NULL,
  PRIMARY KEY (`IDUsuario`,`IDFilme`),
  KEY `IDFilme` (`IDFilme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariofilmes`
--

INSERT INTO `usuariofilmes` (`IDUsuario`, `IDFilme`) VALUES
(2, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariojogos`
--

CREATE TABLE IF NOT EXISTS `usuariojogos` (
  `IDUsuario` int(11) NOT NULL,
  `IDJogo` int(11) NOT NULL,
  PRIMARY KEY (`IDUsuario`,`IDJogo`),
  KEY `IDJogo` (`IDJogo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariojogos`
--

INSERT INTO `usuariojogos` (`IDUsuario`, `IDJogo`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariooutros`
--

CREATE TABLE IF NOT EXISTS `usuariooutros` (
  `IDUsuario` int(11) NOT NULL,
  `IDOutro` int(11) NOT NULL,
  PRIMARY KEY (`IDUsuario`,`IDOutro`),
  KEY `IDOutro` (`IDOutro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariooutros`
--

INSERT INTO `usuariooutros` (`IDUsuario`, `IDOutro`) VALUES
(1, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarioesportes`
--
ALTER TABLE `usuarioesportes`
  ADD CONSTRAINT `usuarioesportes_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usuarioesportes_ibfk_2` FOREIGN KEY (`IDEsporte`) REFERENCES `esportes` (`ID`);

--
-- Limitadores para a tabela `usuariofilmes`
--
ALTER TABLE `usuariofilmes`
  ADD CONSTRAINT `usuariofilmes_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usuariofilmes_ibfk_2` FOREIGN KEY (`IDFilme`) REFERENCES `filmes` (`ID`);

--
-- Limitadores para a tabela `usuariojogos`
--
ALTER TABLE `usuariojogos`
  ADD CONSTRAINT `usuariojogos_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usuariojogos_ibfk_2` FOREIGN KEY (`IDJogo`) REFERENCES `jogos` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
