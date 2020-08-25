-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2020 às 10:01
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pratico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codProduto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `departamento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codProduto`, `nome`, `marca`, `preco`, `departamento`) VALUES
(2, 'Sabão em pó', 'Zé limpinho', 7, 'Produtos de limpeza'),
(3, 'Leite', 'Shefa', 3, 'Bebidas'),
(4, 'Fermento', 'Um', 10, 'Alimentos'),
(12, 'Leite novo', 'NOvo', 2, 'Bebidas'),
(23, 'Farinha', 'Brava', 5, 'Alimentos'),
(24, 'Cocada', 'Bahiana', 10, 'Alimentos'),
(32, 'Chocolate', 'Kichoco', 3, 'Alimentos'),
(34, 'Café', 'Delta', 5, 'Cafés'),
(36, 'Maçã', 'golden', 2.25, 'alimentos'),
(37, 'Banana', 'madeira', 1.15, 'alimentos'),
(38, 'Manteiga', 'Açores', 1.69, 'alimentos'),
(39, 'Uva', 'Açores', 3, 'alimentos'),
(40, 'ovo', 'granja', 2, 'alimentos'),
(41, 'carne', 'granja', 6, 'alimentos'),
(42, 'Peixe gato', 'pingoDoce', 2, 'Peixaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'brunoLorena', '$2y$10$V9.RR8pEXkncJLPb5Snoueukm3oZF3uuHHh76KQsjsmHjmkfaot9u', '2020-08-04 10:41:57'),
(2, 'bruno1', '$2y$10$wX9fiA3XQEUrhDKGP6MbNOFKj73WhCcSKtJMIiiJTcJxerlbpycI.', '2020-08-23 15:36:37');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codProduto`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `codProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
