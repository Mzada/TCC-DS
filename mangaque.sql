-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17-Maio-2025 às 13:24
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mangaque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `idAvaliacao` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `dataAvaliacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nota` int(11) NOT NULL,
  `idObra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`idAvaliacao`, `IdUsuario`, `comentario`, `dataAvaliacao`, `nota`, `idObra`) VALUES
(2, 6, 'O spider e meu heroi favorito, gosto muito das historias dele.', '2025-05-09 19:39:43', 5, 2),
(3, 6, 'Teste Editar avaliaÃ§Ã£o  com text area', '2025-05-15 03:27:51', 4, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obras`
--

CREATE TABLE `obras` (
  `idObra` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_publicacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `obras`
--

INSERT INTO `obras` (`idObra`, `nome`, `autor`, `capa`, `ano_publicacao`) VALUES
(1, 'Crise Nas Infinitas Terras #1', 'Marv Wolfman, George Perez', './images/crise.png', 1985),
(2, 'Homem-Aranha e DeadPool #7', 'Marvel', './images/aranha.png', 2017),
(3, 'X-Men 97', 'Salvador Espin, Steve Foxe', './images/xmen97.png', 2023),
(4, 'Agatha Harkness - The Saga Of The Salem Witch ', 'Stan Lee', './images/agatha.png', 2024),
(5, 'Feiticeira Escarlate #1', 'Christopher Allen, Russell Dauterman, Sara Pichelli, Stephanie Williams, Steve Orlando', './images/wanda.png', 2024),
(6, 'Batman - Aventuras da Família Wayne #1', 'Payne CRC', './images/wayne.png', 2024),
(7, 'Loki - Agente de Asgard', 'Al Ewing', './images/loki.png', 2017),
(8, 'Alvorecer da DC - Titãs', 'DC Comics', './images/titans.png', 2023),
(9, 'Harley Quinn - The Eat Bang! Kill Tour #3', 'Tee Franklin', './images/arle.png', 2021),
(10, 'Vox Magchina Origins', 'Critical Role', './images/cr.png', 2019),
(11, 'Jujutsu Kaisen #1', 'Gege Akutami', './images/juju.png', 2020),
(12, 'Demon Slayer #1', 'Koyoharo Gotouge', './images/demon.png', 2020),
(13, 'SuperOnze #1', 'Tenya Yabuno', './images/onze.png', 2013),
(14, 'Solo Leveling #1', 'Chugong', './images/solo.png', 2019),
(15, 'Given #1', 'Natsuki Kizu', './images/given.png', 2020),
(16, 'Blue Lock #1', 'Muneyuki Kaneshira', './images/blue.png', 2020),
(17, 'One Piece #1', 'Eiichiro Oda', './images/one.png', 2025),
(18, 'Pokémon- Red Green Blue #1', 'Hidenori Kusaka', './images/po.png', 2017),
(19, 'Dungeon Meshi #1', 'Ryoko Kui', './images/dungeon.png', 2017),
(20, 'Atque dos Titãs #1', 'Hajime Isayama', './images/aot.png', 2021);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `nome_completo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `fotoPerfil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `nome_completo`, `apelido`, `email`, `senha`, `data_nascimento`, `fotoPerfil`) VALUES
(1, 'Bianca Felix Lustosa', 'Bia', 'bianca.lustosa@etec.sp.gov.br', '$2y$10$WAvMboCob.sOO4rLmEDNgOxGIyRDHwgO269Rpu6DMj5yAk3piBwjO', '1998-04-08', NULL),
(2, 'Sherlock Holmes', 'Sherlock', 'sherlock.detetive@scotlandyard.uk', '$2y$10$g13QFzPPutMU7YPwB1wUy.x4myabLcXW2PvSqdmPmxVHrBww4h25S', '1998-04-08', NULL),
(3, 'Bianca Felix Lustosa', 'Bia', 'biafelix08@gmail.com', '$2y$10$QP2kP4l.k5Y5MEnqEiZJ0OSTbAg.TZ3fvkaAdjzU7HZZTkRafqD0S', '1998-04-08', NULL),
(4, 'Bianca Felix Lustosa', 'Bia', 'bianca.flustosa@outlook.com', '$2y$10$JL/hIx1rNANnHgfQlRSNHuYpiJ2ng/zfi9aPEiJS.b4nWUoG1ocVC', '1998-04-08', NULL),
(5, 'Bianca Felix Lustosa', 'Bia', 'bianca.flustosa@gmail.com', '$2y$10$oMdscawZH6.1lSTGysUQWO5Au/GtLE9tQMQO.ihXevqlbV77hmRXC', '1998-04-08', NULL),
(6, 'Bianca Felix Lustosa', 'Bia Florzinha', 'biaflorzinha@gmail.com', '$2y$10$z.0oNhMcQxnFQZDvhANl4.miJsH01h3k.5uNAcyAclbsfZDMdb1NC', '1998-04-08', './img/perfis/perfil_6827efe6e3a25.JPG'),
(7, 'Bianca Felix Lustosa', 'Bia', 'bia123@gmail.com', '$2y$10$jJb6jC5QeVsFVKNPgGhbd.t9TVpjIjcAFoNTgvg7MIeeZSHrqvM3q', '1998-04-08', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `id` (`IdUsuario`),
  ADD KEY `fk_obra` (`idObra`);

--
-- Índices para tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`idObra`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `idObra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `fk_obra` FOREIGN KEY (`idObra`) REFERENCES `obras` (`idObra`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
