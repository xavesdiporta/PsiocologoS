-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 12:02
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `all_chat_logs`
--

CREATE TABLE `all_chat_logs` (
  `id` int(11) NOT NULL,
  `user_send` varchar(50) NOT NULL,
  `user_receive` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `all_chat_logs`
--

INSERT INTO `all_chat_logs` (`id`, `user_send`, `user_receive`, `message`, `timestamp`) VALUES
(1, 'lolita123', 'Geral', 'asd', '2023-06-09 15:37:28'),
(2, 'lolita123', 'Geral', 'asd', '2023-06-09 15:37:32'),
(3, 'lolita123', 'Geral', 'asd', '2023-06-09 15:37:56'),
(4, 'paxaxa23', 'Geral', 'asd', '2023-06-09 15:38:26'),
(5, 'lolita123', 'Geral', 'asd', '2023-06-09 15:38:51'),
(6, 'lolita123', 'Geral', 'asd', '2023-06-09 15:41:13'),
(7, 'lolita123', 'Geral', 'asd', '2023-06-09 15:42:27'),
(8, 'lolita123', 'Geral', 'asd', '2023-06-09 15:42:50'),
(9, 'lolita123', 'Geral', 'asd', '2023-06-09 15:43:27'),
(10, 'lolita123', 'Geral', '', '2023-06-09 15:43:28'),
(11, 'lolita123', 'Geral', '', '2023-06-09 15:43:31'),
(12, 'lolita123', 'Geral', '', '2023-06-09 15:43:32'),
(13, 'paxaxa23', 'Geral', 'asd', '2023-06-09 15:45:39'),
(14, 'lolita123', 'Geral', 'asd', '2023-06-09 16:38:38'),
(15, 'Xaves', 'Geral', 'aloo', '2023-06-12 09:40:34'),
(16, 'Xico', 'Geral', 'asd', '2023-06-12 09:52:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_logs`
--

CREATE TABLE `chat_logs` (
  `id` int(11) NOT NULL,
  `user_send` varchar(50) NOT NULL,
  `user_receive` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chat_logs`
--

INSERT INTO `chat_logs` (`id`, `user_send`, `user_receive`, `message`, `timestamp`) VALUES
(1, 'paxaxa23', 'velez', 'asd', '2023-06-09 15:13:38'),
(2, 'paxaxa23', 'Geral', 'asd', '2023-06-09 15:14:59'),
(3, 'paxaxa23', 'Geral', 'asd', '2023-06-09 15:32:50'),
(4, 'lolita123', 'Geral', 'asd', '2023-06-09 15:32:57'),
(5, 'lolita123', 'Geral', 'asd', '2023-06-09 15:32:59'),
(6, 'paxaxa23', 'Geral', 'asd', '2023-06-09 15:35:28'),
(7, 'lolita123', 'Geral', 'asd', '2023-06-09 15:36:22'),
(8, 'lolita123', 'paxaxa23', 'asd', '2023-06-09 16:00:38'),
(9, 'lolita123', 'paxaxa23', 'ola minha princesa yah', '2023-06-09 16:00:55'),
(10, 'paxaxa23', 'lolita123', 'asd', '2023-06-09 16:01:18'),
(11, 'paxaxa23', 'lolita123', 'oioi', '2023-06-09 16:02:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'paxaxa23', '$2y$10$16MZwIZyd/LhPzxVrIJ/7.uOqBljmXdBnjggWxom.03V1Dh5F8Zj2', 'Offline'),
(2, 'paxaxa40', '$2y$10$8eBTKqm0kgWTLi9dD5omMuvS.f6GGb9iIYW/sdjx2hVXVwchLnaAq', 'offline'),
(3, 'lolita123', '$2y$10$6IjuwRKeRT3OXu2vagDG0eVVhHG7b.5sHMjmXvHHOW0RxcjD3Fa5a', 'Active'),
(4, 'johnnyVelez', '$2y$10$nnC/BZLJURn3v9kUHLrseOM9ZPLnHQHC6jkbB4RdjuFSRPHHhv/bG', 'offline'),
(5, 'johnnyVelez2', '$2y$10$yXdO9mrJObCb3FuK/.5rMeZ4oFeP.6UGWq9kNLNHfS1dJ262cZY0e', 'offline'),
(6, 'xavierMargarido', '$2y$10$mbrUBUHu9lQ2YShLj4nWl.U3V9B4Hf8zGTcjXzuDsMLAqw9d9AY0a', 'offline'),
(8, 'velez', '$2y$10$LR7EBJJtd0AjL99Qi2fu6eYjai.WLRd7dnmE9u/8Kvs07fEgIUHye', 'Active'),
(9, 'paxaxa69', '$2y$10$Eku56O7nOtoeuRpL40fo4ObmAkiftKUo24ze77rJfEemT.bEcgzua', 'offline'),
(10, 'teste123', '$2y$10$XR5A.rVzm.GiCj12zce64OtU/lb0JztH3KLEYGVG6.0E/D1Ztl20.', 'offline'),
(11, 'Xaves', '$2y$10$wGCUaKYqJq8djUqrA9Vnbuw.pqbSJiiCWCsP99L/D3l4yuF8pgCM.', 'Anonymous'),
(12, 'Xico', '$2y$10$veJTb7l8w25eJcZyP09e0elPy49Ku8SWsPOlhCLekqXVbHyCDjOLG', 'Active');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `all_chat_logs`
--
ALTER TABLE `all_chat_logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat_logs`
--
ALTER TABLE `chat_logs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `all_chat_logs`
--
ALTER TABLE `all_chat_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `chat_logs`
--
ALTER TABLE `chat_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
