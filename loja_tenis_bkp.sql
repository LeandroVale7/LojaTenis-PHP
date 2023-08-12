-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Dez-2022 às 15:40
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_tenis`
--
CREATE DATABASE IF NOT EXISTS `loja_tenis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `loja_tenis`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `matr` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `UF` varchar(4) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `funcao` varchar(45) NOT NULL,
  `num_casa` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`matr`, `nome`, `sobrenome`, `login`, `senha`, `telefone`, `cep`, `bairro`, `UF`, `cidade`, `funcao`, `num_casa`, `status`) VALUES
(0, 'admin', 'admin', 'admin', '1', 0, 0, 'setor', 'DF', 'Santa', 'Administrador', 203, 'A'),
(1, 'Paulo', 'Haitty', 'POU', '9118', 981482655, 72530400, 'Setor Meireles', 'DF', 'Santa Maria', 'Administrador', 204, 'A'),
(4, 'João', 'Estoquista', 'J', '1', 981237457, 75369800, 'Setor Meireles', 'DF', 'Santa Maria', 'Estoquista', 402, 'A'),
(5, 'Pedro', 'Vende', 'P', '1', 975632859, 72567940, 'Setor A', 'DF', 'Santa', 'Vendedor', 404, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nf`
--

CREATE TABLE `nf` (
  `cod_nf` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `preco` decimal(5,0) NOT NULL,
  `Cliente_CPF` int(11) NOT NULL,
  `Funcionario_matr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tenis`
--

CREATE TABLE `tenis` (
  `foto` varchar(150) NOT NULL,
  `carrinho` char(1) NOT NULL DEFAULT 'N',
  `modelo` varchar(45) NOT NULL,
  `cod_tenis` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `tamanho` int(2) NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `altura_cano` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `nf_cod_nf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tenis`
--

INSERT INTO `tenis` (`foto`, `carrinho`, `modelo`, `cod_tenis`, `genero`, `tamanho`, `preco`, `cor`, `tipo`, `altura_cano`, `marca`, `nf_cod_nf`) VALUES
('img/tenis1.jpg', 'N', 'Boost', 11, 'Masculino', 40, '79.99', 'Preto', 'Esportivo', 'Alta', 'QueroShoes', NULL),
('img/Voko.webp', 'N', 'Vocke', 12, 'Masculino', 40, '249.90', 'Preto', 'Casual', 'Alta', 'Voko', NULL),
('img/BMWred.webp', 'N', 'BMW', 13, 'Feminino', 41, '179.90', 'Preto e Vermelho', 'Esportivo', 'Alta', 'SPORT', NULL),
('img/BMWwhite.webp', 'N', 'BMW', 14, 'Masculino', 42, '189.99', 'Preto e Branco', 'Esportivo', 'Alta', 'SPORT', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`matr`);

--
-- Índices para tabela `nf`
--
ALTER TABLE `nf`
  ADD PRIMARY KEY (`cod_nf`),
  ADD KEY `fk_nf_Cliente1_idx` (`Cliente_CPF`),
  ADD KEY `fk_nf_Funcionario1_idx` (`Funcionario_matr`);

--
-- Índices para tabela `tenis`
--
ALTER TABLE `tenis`
  ADD PRIMARY KEY (`cod_tenis`),
  ADD KEY `fk_tenis_nf1_idx` (`nf_cod_nf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `matr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `nf`
--
ALTER TABLE `nf`
  MODIFY `cod_nf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tenis`
--
ALTER TABLE `tenis`
  MODIFY `cod_tenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `nf`
--
ALTER TABLE `nf`
  ADD CONSTRAINT `fk_nf_Funcionario1` FOREIGN KEY (`Funcionario_matr`) REFERENCES `funcionario` (`matr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tenis`
--
ALTER TABLE `tenis`
  ADD CONSTRAINT `fk_tenis_fn1` FOREIGN KEY (`nf_cod_nf`) REFERENCES `nf` (`cod_nf`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
