-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Dez-2022 às 23:52
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CPF` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(4) NOT NULL,
  `num_casa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `num_casa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`matr`, `nome`, `sobrenome`, `login`, `senha`, `telefone`, `cep`, `bairro`, `UF`, `cidade`, `funcao`, `num_casa`) VALUES
(0, 'admin', 'admin', 'admin', '1', 0, 0, 'NULL', 'NO', 'NULL', 'Administrador', 0),
(3, 'Paulo', 'Haitty', 'POU', '9118', 981482655, 72530400, 'Setor Meireles', 'DF', 'Santa Maria', 'Administrador', 204);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tenis`
--

INSERT INTO `tenis` (`foto`, `carrinho`, `modelo`, `cod_tenis`, `genero`, `tamanho`, `preco`, `cor`, `tipo`, `altura_cano`, `marca`, `nf_cod_nf`) VALUES
('img/tenis1.jpg', 'N', 'sla', 11, 'Masculino', 40, '79.00', 'Preto', 'Esportivo', 'Alta', 'QueroShoes', NULL),
('img/Voko.webp', 'N', 'Voko', 12, 'Masculino', 40, '249.90', 'Vermelho', 'Casual', 'Alta', 'Voko', NULL),
('img/preto.jpg', 'N', 'dsadas', 13, 'Feminino', 34, '300.00', 'vermelho', 'alto', '2', 'das', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CPF`);

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
  MODIFY `matr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `nf`
--
ALTER TABLE `nf`
  MODIFY `cod_nf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tenis`
--
ALTER TABLE `tenis`
  MODIFY `cod_tenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `nf`
--
ALTER TABLE `nf`
  ADD CONSTRAINT `fk_nf_Cliente1` FOREIGN KEY (`Cliente_CPF`) REFERENCES `cliente` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
