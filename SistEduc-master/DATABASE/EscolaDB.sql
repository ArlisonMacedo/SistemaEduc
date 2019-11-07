-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Nov-2019 às 19:03
-- Versão do servidor: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `EscolaDB`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alunos`
--

CREATE TABLE IF NOT EXISTS `Alunos` (
`MAT` int(10) unsigned NOT NULL,
  `NOMEALUNO` varchar(100) NOT NULL,
  `CPF` char(14) NOT NULL,
  `Data_nasc` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1014 ;

--
-- Extraindo dados da tabela `Alunos`
--

INSERT INTO `Alunos` (`MAT`, `NOMEALUNO`, `CPF`, `Data_nasc`) VALUES
(1009, 'Luanna Alana', '000.000.000-92', '2019-11-05'),
(1012, 'Arlison Macedo', '000.000.000-00', '1996-06-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CURSO`
--

CREATE TABLE IF NOT EXISTS `CURSO` (
`ID` int(11) NOT NULL,
  `cUrSo` varchar(45) NOT NULL,
  `DICIPLINA` varchar(45) NOT NULL,
  `NOTA1` float unsigned DEFAULT NULL,
  `NOTA2` float unsigned DEFAULT NULL,
  `MEDIA` float DEFAULT NULL,
  `Alunos_MAT` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `CURSO`
--

INSERT INTO `CURSO` (`ID`, `cUrSo`, `DICIPLINA`, `NOTA1`, `NOTA2`, `MEDIA`, `Alunos_MAT`) VALUES
(11, 'ADS', 'Engenharia', 8, 9, 8.5, 1009),
(16, 'ADS', 'LP4', 10, 4, 7, 1012),
(17, 'ADS', 'Etica', 7, 10, 8.5, 1012);

-- --------------------------------------------------------

--
-- Estrutura da tabela `FUNCIONARIO`
--

CREATE TABLE IF NOT EXISTS `FUNCIONARIO` (
`COD` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `SENHA` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `FUNCIONARIO`
--

INSERT INTO `FUNCIONARIO` (`COD`, `NOME`, `CPF`, `email`, `SENHA`) VALUES
(1, 'Admin@Root', '400.540.054-00', 'admin777@root.com', '00000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Alunos`
--
ALTER TABLE `Alunos`
 ADD PRIMARY KEY (`MAT`), ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`);

--
-- Indexes for table `CURSO`
--
ALTER TABLE `CURSO`
 ADD PRIMARY KEY (`ID`,`Alunos_MAT`), ADD KEY `fk_CURSO_Alunos_idx` (`Alunos_MAT`);

--
-- Indexes for table `FUNCIONARIO`
--
ALTER TABLE `FUNCIONARIO`
 ADD PRIMARY KEY (`COD`), ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Alunos`
--
ALTER TABLE `Alunos`
MODIFY `MAT` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1014;
--
-- AUTO_INCREMENT for table `CURSO`
--
ALTER TABLE `CURSO`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `FUNCIONARIO`
--
ALTER TABLE `FUNCIONARIO`
MODIFY `COD` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `CURSO`
--
ALTER TABLE `CURSO`
ADD CONSTRAINT `fk_CURSO_Alunos` FOREIGN KEY (`Alunos_MAT`) REFERENCES `Alunos` (`MAT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
