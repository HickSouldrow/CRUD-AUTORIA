-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2024 às 16:35
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autoria`
--
CREATE DATABASE `autoria`;
USE `autoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `NomeAutor` varchar(25) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Guimarães', 'Rosa', 'GuimaraesRosaUwU@bol.com.br', '1989-12-14'),
(2, 'Mário', 'Quintana', 'MariokintanaAlegria@gmail.com', '1990-02-20'),
(3, 'Clarice', 'Lispector', 'ClarinhadaSilvaLispector@hotmail.com', '1986-02-22'),
(4, 'Luis Fernando', 'Verissimo', 'ComegetFernandao@gmail.com', '1995-09-18'),
(5, 'Conceição', 'Evaristo', 'ConceicaoEvaristo676@gmail.com', '2024-10-25'),
(6, 'Jorge', 'Amado', 'JorginhoCacadordePoemas213@bol.com', '1977-04-30'),
(7, 'José', 'de Alencar', 'MinhacontanoTwitterninguemapaga@hotmail.com', '1989-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_Autor` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_Autor`, `Cod_Livro`, `DataLancamento`, `Editora`) VALUES
(3, 2, '2023-12-11', 'Axcel Books'),
(3, 1, '2016-10-07', 'Ana Luísa Escorel'),
(2, 5, '2005-05-31', 'Grupo A (editora)'),
(4, 4, '1977-10-10', 'Ateliê Editorial'),
(3, 5, '2024-09-12', 'Editora Ariel'),
(6, 3, '2018-08-29', 'AP Cultural'),
(6, 4, '1997-12-08', 'Artenova'),
(5, 5, '1992-08-07', 'Caiaponte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(65) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'Água Viva', 'Romance psicológico', '978–85–333–0227–3 ', 'Português', 343),
(2, 'A Hora da Estrela', ' Romance, Romance psicológico', '945–85–334–1232–4', 'Português', 233),
(3, 'Capitães da Areia ', 'Romance, Ficção', '755–05–674–1178–0', 'Português', 232),
(4, 'Mar morto', 'Romance, Ficção', '788–12–311–2033–4', 'Português', 149),
(5, 'A Rua dos Cataventos', ' Literatura', '237-89-348-7089-7', 'Português', 234);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- Estrutura da tabela `usuario`

CREATE TABLE `usuario` (
  `Login` varchar(5) NOT NULL,
  `Senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Extraindo dados da tabela `usuario`
INSERT INTO `usuario` (`Login`, `Senha`) VALUES
  ('green', 12345678),
  ('red', 87654321);
--
-- Índices para tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
