-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Abr-2021 às 23:30
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_marcacao_online`
--  
 
 CREATE DATABASE `sistema_marcacao_online`;

 USE `sistema_marcacao_online`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_veiculo`
--

CREATE TABLE `categoria_veiculo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria_veiculo`
--

INSERT INTO `categoria_veiculo` (`id`, `nome`, `preco`) VALUES
(1, 'motociclo', 50),
(2, 'automovel ligeiro', 100),
(3, 'automovel pesado', 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_inspecao`
--

CREATE TABLE `centro_inspecao` (
  `id` int(11) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  `horario` time NOT NULL,
  `id_preco` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `centro_inspecao`
--

INSERT INTO `centro_inspecao` (`id`, `localizacao`, `horario`, `id_preco`, `id_categoria`) VALUES
(1, 'Castelo Branco/Portugal ,Nuno ALvares ,lote 23', '10:30:00', 1, 1),
(2, 'Castelo Branco/Portugal ,Nuno ALvares ,lote 24', '12:30:00', 2, 2),
(3, 'Castelo Branco/Portugal ,Nuno ALvares ,lote 24', '15:30:00', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao`
--

CREATE TABLE `marcacao` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_preco` int(11) NOT NULL,
  `id_utilizador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcacao`
--

INSERT INTO `marcacao` (`id`, `data`, `hora`, `id_preco`, `id_utilizador`) VALUES
(5, '2021-05-29', '15:10:00', 2, 'cliente'),
(8, '2021-04-30', '15:10:00', 1, 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_utilizador`
--

CREATE TABLE `tipo_utilizador` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_utilizador`
--

INSERT INTO `tipo_utilizador` (`id`, `descricao`) VALUES
(1, 'admin'),
(2, 'cliente'),
(3, 'inspector'),
(4, 'inactivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_tipo_utilizador` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `morada` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_tipo_utilizador`, `nome`, `senha`, `morada`, `telefone`, `idade`, `sexo`) VALUES
(1, 'admin', 'admin', 'Rua', 911223541, 30, 'm'),
(2, 'cliente', 'cliente', 'Rua Sr Mercules ,Castelo Brancp', 944215687, 40, 'f'),
(3, 'inspector', 'inspector', 'Dr', 933044195, 29, 'f'),
(2, 'jay', '123', 'Dr', 93302233, 27, 'm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria_veiculo`
--
ALTER TABLE `categoria_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `centro_inspecao`
--
ALTER TABLE `centro_inspecao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_preco` (`id_preco`);

--
-- Índices para tabela `marcacao`
--
ALTER TABLE `marcacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_preco` (`id_preco`);

--
-- Índices para tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `id_tipo_utilizador` (`id_tipo_utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria_veiculo`
--
ALTER TABLE `categoria_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `centro_inspecao`
--
ALTER TABLE `centro_inspecao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `marcacao`
--
ALTER TABLE `marcacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `centro_inspecao`
--
ALTER TABLE `centro_inspecao`
  ADD CONSTRAINT `centro_inspecao_ibfk_1` FOREIGN KEY (`id_preco`) REFERENCES `categoria_veiculo` (`id`);

--
-- Limitadores para a tabela `marcacao`
--
ALTER TABLE `marcacao`
  ADD CONSTRAINT `marcacao_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`nome`),
  ADD CONSTRAINT `marcacao_ibfk_2` FOREIGN KEY (`id_preco`) REFERENCES `categoria_veiculo` (`id`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`id_tipo_utilizador`) REFERENCES `tipo_utilizador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
