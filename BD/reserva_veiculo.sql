-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2018 às 14:18
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserva_veiculo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `idade` int(150) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` text,
  `telefone` varchar(25) DEFAULT NULL,
  `celular` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `idade`, `cpf`, `data_nascimento`, `endereco`, `telefone`, `celular`) VALUES
(1, 'Lucas', 20, '134.259.789-88', '1998-03-25', 'Rua: WwowÃ§d Qd: 5 Lt: 80  Setor: Opw.s', '(62) 7070-7070', '(62) 9 8732-5929'),
(3, 'Teste', 116, '987.456.158-79', '1902-08-30', 'Setor: Nosow Rua: SJOFOW Qd: 88 Lt: 962', '(77) 7778-7778', '(77) 9 8887-8887'),
(6, 'Teste Outro', 13, '456.123.789-88', '2005-02-08', 'Setor: Opwo Rua: w9w Qd: S8 Lt: txtd', '(55) 4441-4441', '(55) 9 1114-2121'),
(7, 'Marcelo', 19, '062.551.562-32', '1998-11-08', 'Setor: Xowo  Rua: pOSOs', '(62) 5146-1267', '(62) 9 5658-5614'),
(8, 'Jao Silva', 28, '456.899.789-89', '1990-08-14', 'Setor: okafos  Rua ajsdfo  Qd 56w Lt 79w', '(11) 1111-2316', '(65) 9 6561-5949');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_carro` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `pessoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `id_carro`, `data_inicio`, `data_fim`, `pessoa`) VALUES
(1, 1, '2018-01-05', '2018-01-10', '1'),
(2, 4, '2018-01-07', '2018-01-08', '6'),
(4, 4, '2018-08-20', '2018-08-05', 'Pedro'),
(6, 2, '2018-03-15', '2018-04-30', 'Mazin'),
(7, 2, '2018-10-15', '2018-10-30', 'Lucas Plus'),
(8, 1, '2018-09-19', '2018-09-21', 'Plus Team'),
(9, 3, '2018-09-04', '2018-09-19', 'PlusPlayTTX'),
(10, 5, '2018-10-01', '2018-10-25', '6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `ip`) VALUES
(1, 'adm@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(2, 'pedro@gmail.com', '698dc19d489c4e4db73e28a713eab07b'),
(3, 'leonardodance2011@dddd', '9a33543ee42bb7791905ab66ed0555d9'),
(4, 'teste@gmail.com.br.tk', '6ebe76c9fb411be97b3b0d48b791a7c9'),
(5, 'joao@gmail.com.br.tk', '57f231b1ec41dc6641270cb09a56f897');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `modelo` varchar(25) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  `chassi` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `marca`, `modelo`, `cor`, `ano`, `chassi`) VALUES
(1, 'Lambo', 'XZTL', 'Preta/Cinza', 2022, '9weoi wowod 79w5'),
(2, 'Chevrolet', 'ZX', 'BLUE', 2002, '798 iei 49w 98w'),
(3, 'BMW', 'MP', 'BLACK', 2000, '9d9w8d5ds 4swdsd'),
(4, 'Nissan', 'DADS', 'EEEW', 2005, 'owo 7w9r88k98k'),
(5, 'OOP', 'GTR', 'Yellow', 2019, 'iol5 5ul545u 5uil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
