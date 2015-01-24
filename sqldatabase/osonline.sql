-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Jan-2015 às 17:03
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `osonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `rg` int(11) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `complemento` varchar(35) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(35) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `pais` char(3) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `telefone_res` int(11) DEFAULT NULL,
  `telefone_com` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `nome`, `cpf`, `rg`, `data_nasc`, `sexo`, `cep`, `endereco`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `email`, `celular`, `telefone_res`, `telefone_com`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 1', 12312312312, 121231231, '1987-03-17', 'm', 15775000, 'rua a', '', 'centro', 'santa fe do sul', 'sp', 'bra', 'cliente1@teste.com', 11123451234, 1112341234, 1112341234, 1, '2015-01-24 17:44:29', '2015-01-24 17:47:41'),
(2, 'Cliente 2', 32132132133, 213213211, '1991-06-16', 'f', 15775000, 'rua b', 'casa B', 'centro', 'santa fe do sul', 'sp', 'Bra', 'cliente2@teste.com', 0, 2147483647, 0, 1, '2015-01-24 17:55:51', '2015-01-24 17:55:51'),
(3, 'Cliente 3 ', 22233344455, 2147483647, '1980-10-20', 'm', 15775000, 'rua c', '', 'centro', 'santa fe do sul', 'sp', 'Bra', 'cliente3@teste.com', 99099998888, 2147483647, 0, 1, '2015-01-24 17:57:01', '2015-01-24 17:57:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `employees`
--

INSERT INTO `employees` (`id`, `nome`, `cargo`, `cpf`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Funcionario 1', 'tecnico', 12334556778, 1, '2015-01-24 17:59:51', '2015-01-24 17:59:51'),
(2, 'funcionario 2', 'tecnico', 33333333333, 1, '2015-01-24 18:00:11', '2015-01-24 18:00:11'),
(3, 'funcionario 3', 'vendedor', 44444444444, 1, '2015-01-24 18:00:51', '2015-01-24 18:00:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jobs_id` int(10) unsigned DEFAULT NULL,
  `products_id` int(10) unsigned DEFAULT NULL,
  `orders_id` int(10) unsigned NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `items_orders_id_foreign` (`orders_id`),
  KEY `items_jobs_id_foreign` (`jobs_id`),
  KEY `items_products_id_foreign` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `jobs_id`, `products_id`, `orders_id`, `descricao`, `quantidade`, `tipo`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 2, '', 1, 's', '2015-01-24 18:27:58', '2015-01-24 18:27:58'),
(3, 0, 3, 2, '', 2, 'p', '2015-01-24 18:28:30', '2015-01-24 18:28:30'),
(4, 3, 0, 3, '', 1, 's', '2015-01-24 18:29:14', '2015-01-24 18:29:14'),
(5, 5, 0, 3, '', 1, 's', '2015-01-24 18:29:21', '2015-01-24 18:29:21'),
(6, 2, 0, 4, '', 1, 's', '2015-01-24 18:30:20', '2015-01-24 18:30:20'),
(7, 0, 1, 4, '', 1, 'p', '2015-01-24 18:30:37', '2015-01-24 18:30:37'),
(8, 0, 2, 4, '', 1, 'p', '2015-01-24 18:30:46', '2015-01-24 18:30:46'),
(9, 2, 0, 5, '', 1, 's', '2015-01-24 18:31:30', '2015-01-24 18:31:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `valor_uni` decimal(6,2) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `jobs`
--

INSERT INTO `jobs` (`id`, `titulo`, `descricao`, `valor_uni`, `ativo`, `created_at`, `updated_at`) VALUES
(0, 'selecione', NULL, 0.00, 1, '2015-01-01 02:00:00', '2015-01-01 02:00:00'),
(1, 'Formatação simples', 'Formatação windows sem backup', 35.00, 1, '2015-01-24 18:01:27', '2015-01-24 18:01:27'),
(2, 'Formatação com backu', 'formatação de windows com backup', 50.00, 1, '2015-01-24 18:04:25', '2015-01-24 18:04:25'),
(3, 'limpeza', 'limpeza do hardware', 15.00, 1, '2015-01-24 18:04:40', '2015-01-24 18:04:40'),
(4, 'serviços gerais 1', 'mão de obra', 25.00, 1, '2015-01-24 18:05:15', '2015-01-24 18:05:15'),
(5, 'serviços gerais 2', 'mão de obra', 10.00, 1, '2015-01-24 18:05:31', '2015-01-24 18:05:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_15_195904_users', 1),
('2014_12_19_112548_customers', 1),
('2014_12_27_095350_suppliers', 1),
('2014_12_29_105525_employees', 1),
('2014_12_29_132938_jobs', 1),
('2015_01_05_105221_products', 1),
('2015_01_07_112301_orders', 1),
('2015_01_09_112058_items', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customers_id` int(10) unsigned NOT NULL,
  `employees_id` int(10) unsigned NOT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `observacao` varchar(120) DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `aberta` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `employees_id`, `usuario`, `observacao`, `total`, `aberta`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'aizelli', 'notebook lenovo', 0.00, 0, '2015-01-24 18:22:23', '2015-01-24 18:28:38'),
(3, 2, 1, 'aizelli', 'PC desktop positivo', 0.00, 1, '2015-01-24 18:29:03', '2015-01-24 18:29:03'),
(4, 3, 3, 'aizelli', 'PC desktop', 0.00, 0, '2015-01-24 18:30:11', '2015-01-24 18:30:52'),
(5, 2, 1, 'aizelli', 'Notebook positivo', 0.00, 1, '2015-01-24 18:31:25', '2015-01-24 18:31:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(10) unsigned NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_uni` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_suppliers_id_foreign` (`suppliers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `suppliers_id`, `nome`, `descricao`, `marca`, `modelo`, `quantidade`, `valor_uni`, `created_at`, `updated_at`) VALUES
(0, 1, 'selecione', NULL, NULL, NULL, 999, 0.00, '2015-01-01 02:00:00', '2015-01-01 02:00:00'),
(1, 1, 'Placa mae', '', 'asus', 'xt1200', 9, 129.00, '2015-01-24 18:06:08', '2015-01-24 18:30:37'),
(2, 1, 'processador', 'processamento de 2,4ghz ', 'Intel', 'i3', 9, 699.00, '2015-01-24 18:06:51', '2015-01-24 18:30:46'),
(3, 1, 'memoria ram 1024mb', 'memoria ram 1024mb, 1333', 'kingston', 'kkst2321', 8, 128.00, '2015-01-24 18:08:38', '2015-01-24 18:28:30'),
(4, 2, 'fonte de energia', 'fonte de energia de 418w reais', 'energy', 'atx3345', 5, 135.00, '2015-01-24 18:09:32', '2015-01-24 18:09:32'),
(5, 2, 'gabinete xt3000', '', 'extreme', 'gammer', 2, 1259.00, '2015-01-24 18:10:37', '2015-01-24 18:10:37'),
(6, 2, 'cooler etx', 'cooler etx sw 1200rpm', 'energy', 'etx3000', 5, 79.00, '2015-01-24 18:11:24', '2015-01-24 18:11:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_emp` varchar(120) DEFAULT NULL,
  `razao_social` varchar(120) NOT NULL,
  `cnpj` bigint(20) NOT NULL,
  `ie` int(11) DEFAULT NULL,
  `cep` int(11) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `complemento` varchar(35) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(35) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `pais` char(3) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `nome_resp` varchar(60) NOT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `telefone1` int(11) NOT NULL,
  `telefone2` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `suppliers`
--

INSERT INTO `suppliers` (`id`, `nome_emp`, `razao_social`, `cnpj`, `ie`, `cep`, `endereco`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `email`, `nome_resp`, `celular`, `telefone1`, `telefone2`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Empresa 1', 'Empresa 1 LTDA', 123123000121, 123456789, 15775000, 'rua 1', '', 'centro', 'santa fe do sul', 'sp', 'Bra', 'empresa1@teste', 'responsavel 1', 0, 2147483647, 0, 1, '2015-01-24 17:58:22', '2015-01-24 17:58:22'),
(2, 'Empresa 2', 'Empresa 2 ME', 9987765000123, 987654321, 15775000, 'rua 2', '', 'centro', 'santa fe do sul', 'sp', 'Bra', 'empresa2@teste', 'responsavel 2', 88888888888, 2147483647, 0, 1, '2015-01-24 17:59:30', '2015-01-24 17:59:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefone_cont` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_usuario_unique` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `usuario`, `password`, `telefone_cont`, `ativo`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexandre Cesar Martins Izelli', 'alexandre.izelli@gmail.com', 'aizelli', '$2y$10$/HVo9vh2EofKl7lTDwUo0eH4sWjR9dxwOeiHo0XmvYF9i3hLOYWku', 1736411843, 1, 0, 'g5Uf8Wo5N4zW24clQdvXButiCp0scd9fQi8MYKbFbOByRIR4GFB6WR2ZKeJW', '2015-01-24 16:52:34', '2015-01-24 18:35:46'),
(2, 'Teste', 'teste@teste.com', 'teste', '$2y$10$N/xJjSRnMjrF0E8GyJDDsOM8LmHe.Is49DW6mMVlYHKa0c5QwuSG2', 1712341234, 1, 1, 'ExMmhAmfw2uXXf6YnV7YGmy8d4Uv44rxPOZWTyHdXWkBWQwaGs2jVjkMq7Au', '2015-01-24 16:53:24', '2015-01-24 18:37:00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_suppliers_id_foreign` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
