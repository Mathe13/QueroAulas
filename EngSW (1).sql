-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24-Jun-2017 às 19:42
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EngSW`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Admin`
--

CREATE TABLE `Admin` (
  `Nome` varchar(100) NOT NULL,
  `Id` int(11) NOT NULL,
  `Senha` varchar(128) NOT NULL,
  `Email` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Admin`
--

INSERT INTO `Admin` (`Nome`, `Id`, `Senha`, `Email`) VALUES
('Matheus', 1, 'ae8e1cb642688d1b7a54fa0131c28fa8240a81b0f8ecfd8f57a423a9b3b9f8ab3cfbfe00f26204b862f2b57d0ba4df871f79a76fa5784651a11683aebffbd64d', 't@t.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aluno`
--

CREATE TABLE `Aluno` (
  `Curso` varchar(50) NOT NULL,
  `Foto` varchar(120) NOT NULL,
  `ID` int(11) NOT NULL,
  `Instituicao` varchar(30) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(130) NOT NULL,
  `Telefone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Aluno`
--

INSERT INTO `Aluno` (`Curso`, `Foto`, `ID`, `Instituicao`, `Nome`, `Email`, `Senha`, `Telefone`) VALUES
('Engenharia da Computação', '', 1, 'Uergs', 'Matheus', 'matheuslimaaa13@gmail.com', 'ae8e1cb642688d1b7a54fa0131c28fa8240a81b0f8ecfd8f57a423a9b3b9f8ab3cfbfe00f26204b862f2b57d0ba4df871f79a76fa5784651a11683aebffbd64d', '5198029046'),
('testes', '', 2, 'teste', 'teste_maroto', 'teste@maroto.com', '123', '5198029046'),
('Engenharia da Computação', '', 4, 'Uergs', 'TesteGIva', 'giva@teste.com', 'ae8e1cb642688d1b7a54fa0131c28fa8240a81b0f8ecfd8f57a423a9b3b9f8ab3cfbfe00f26204b862f2b57d0ba4df871f79a76fa5784651a11683aebffbd64d', '1111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Horario`
--

CREATE TABLE `Horario` (
  `disponivel` int(11) NOT NULL,
  `hora_inicio` varchar(10) NOT NULL,
  `hora_fim` varchar(10) NOT NULL,
  `dia_inicio` varchar(12) NOT NULL,
  `dia_fim` varchar(12) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Horario`
--

INSERT INTO `Horario` (`disponivel`, `hora_inicio`, `hora_fim`, `dia_inicio`, `dia_fim`, `id_prof`, `id_horario`) VALUES
(1, '00:11', '11:00', 'segunda', 'segunda', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Materias`
--

CREATE TABLE `Materias` (
  `Id` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `Tags` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Materias`
--

INSERT INTO `Materias` (`Id`, `materia`, `Tags`) VALUES
(1, 'c1', ''),
(3, 'Eng SW', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Professor`
--

CREATE TABLE `Professor` (
  `Formacao` varchar(200) NOT NULL,
  `Foto` varchar(120) NOT NULL,
  `Telefone` varchar(9) NOT NULL,
  `ID` int(11) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Instituicao` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(130) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Professor`
--

INSERT INTO `Professor` (`Formacao`, `Foto`, `Telefone`, `ID`, `Valor`, `Instituicao`, `Email`, `Senha`, `Nome`) VALUES
('Deus', '', '11112', 3, 0, 'universo', 'mestre@universo.com', 'ae8e1cb642688d1b7a54fa0131c28fa8240a81b0f8ecfd8f57a423a9b3b9f8ab3cfbfe00f26204b862f2b57d0ba4df871f79a76fa5784651a11683aebffbd64d', 'Baldeus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Prof_X_Mat`
--

CREATE TABLE `Prof_X_Mat` (
  `Id_Prof` int(11) NOT NULL,
  `Id_Mat` int(11) NOT NULL,
  `Valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Prof_X_Mat`
--

INSERT INTO `Prof_X_Mat` (`Id_Prof`, `Id_Mat`, `Valor`) VALUES
(0, 0, 0),
(3, 1, 50.25),
(3, 3, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Aluno`
--
ALTER TABLE `Aluno`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `Horario`
--
ALTER TABLE `Horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `Materias`
--
ALTER TABLE `Materias`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Aluno`
--
ALTER TABLE `Aluno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Horario`
--
ALTER TABLE `Horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Materias`
--
ALTER TABLE `Materias`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Professor`
--
ALTER TABLE `Professor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
