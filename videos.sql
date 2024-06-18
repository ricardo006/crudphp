-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2024 às 07:41
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudphp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`id`, `titulo`, `descricao`, `url`, `created_at`) VALUES
(1, 'A história do E SPORT', 'A história do E SPORT', 'https://youtu.be/g4NWCcWcA10?si=syybQZbeYUvLMiov', '2024-06-15 15:01:02'),
(24, 'Filmes de Terror', 'OS PRIMEIROS FILMES DE TERROR DA HISTÓRIA', 'https://youtu.be/nOb8Dteq_Aw?si=t9lSnvpBI3QQz4OW', '2024-06-17 18:10:02'),
(25, 'Filme de Terror', 'FILMES DE TERROR MAIS ASSUSTADOR', 'https://youtu.be/CkIgNU2qDxk?si=Ah-NN5m7yvM4UXDz', '2024-06-17 18:10:47'),
(26, 'e-Sports', 'e-Sports', 'https://youtu.be/yVP6huJK8yo?si=rh5UBcmDSm0zog7j', '2024-06-17 19:17:24'),
(27, 'e Sports é esporte?', 'Sobre e sports', 'https://youtu.be/Vuct5Ansr1Q?si=hpC2unp-209bsSYa', '2024-06-17 19:33:16'),
(28, 'Como os e-sports se tornaram um fenômeno global', 'Fenômeno global e Sports', 'https://youtu.be/ySZxBvM2JXY?si=fsRzwX2CMKClh0NQ', '2024-06-17 19:36:46'),
(29, 'A história do e Sports', 'A história do e Sports', 'https://youtu.be/OxTRAxVl5HM?si=2o24q6i4a1RlJ36D', '2024-06-17 19:55:05'),
(30, 'E Sport LOL', 'E Sport LOL', 'https://youtu.be/9p0NbT7blmU?si=WTfNawfYPXloqrbE', '2024-06-18 02:37:32'),
(31, 'Vídeo E Sport', 'Vídeo E Sport', 'https://youtu.be/UKjERl8DJeg?si=miRgIi6HT5DmXcUB', '2024-06-18 03:21:55'),
(32, 'E SPORTS', 'E SPORTS', 'https://youtu.be/ieReuaGcYsU?si=GdSgOhRag7xEfU2e', '2024-06-18 04:28:14'),
(33, 'E Sport ', 'E Sport', 'https://youtu.be/g4NWCcWcA10?si=syybQZbeYUvLMiov', '2024-06-18 04:48:13');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
