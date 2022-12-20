-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 27-Out-2022 às 22:14
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
-- Banco de dados: `pizzaria`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedure_altera_situacao_pedido` (IN `num_pedido` INT)   IF (SELECT COUNT(*) FROM pizzaria.pedidoitem WHERE pedidoitem.situacao_item = 'Em PreparaÃ§Ã£o' AND pedidoitem.id_pedido = num_pedido) > 0 THEN
UPDATE pizzaria.pedido SET Situacao='Em Andamento' WHERE id_pedido = num_pedido ; 

ELSEIF (SELECT COUNT(*) FROM pizzaria.pedidoitem WHERE pedidoitem.situacao_item = 'Em Aberto' AND pedidoitem.id_pedido = num_pedido) = 0 THEN 
UPDATE pizzaria.pedido SET Situacao='Finalizado' WHERE id_pedido = num_pedido ; 

ELSEIF (SELECT COUNT(*) FROM pizzaria.pedidoitem WHERE pedidoitem.situacao_item = 'Finalizado' AND pedidoitem.id_pedido = num_pedido) = 0 THEN 
UPDATE pizzaria.pedido SET Situacao='Pedido' WHERE id_pedido = num_pedido ; 

ELSE 
UPDATE pizzaria.pedido SET Situacao='Em Andamento' WHERE id_pedido = num_pedido ;

END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `Celular` varchar(9) DEFAULT NULL,
  `Telefone_Fixo` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `CPF`, `Celular`, `Telefone_Fixo`) VALUES
(1, 'Neymar JÃºnior', '24519535190', '997152220', '24481219'),
(2, 'Caetano Veloso', '57292737110', '999091392', '24540965'),
(3, 'Elvys Presley', '71420509691', '981828432', '43390386'),
(4, 'TatÃ¡ Werneck', '43185248090', '980466690', '48165809'),
(5, 'ChicÃ£o dos Teclados', '62572022729', '984049025', '44452635'),
(6, 'Barack Obama', '67278042577', '984745042', '47552402'),
(7, 'Nelson Mandela', '51174670789', '990946238', '41233724'),
(8, 'Antonio Fagundes', '21452311102', '983101597', '44357876'),
(9, 'Bruna Surfistinha', '88449453550', '981246958', '36637269'),
(10, 'Gustavo Lima', '63364536260', '993691073', '29471590'),
(11, 'Luan Santana', '43061975144', '985153522', '47902058'),
(12, 'Ivete Sangalo', '96300617327', '983271497', '32609279'),
(13, 'Luis InÃ¡cio Bolsonaro', '37813181174', '992907698', '27521884'),
(14, 'ClÃ¡udia Leitte', '97521221400', '994886976', '28930840'),
(15, 'Christina Aguilera', '56134193453', '985224781', '35554807'),
(16, 'Katy Perry', '27738283211', '990085344', '29877904'),
(17, 'LuÃ­sa Sonza', '16196287672', '984972677', '29984099');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataadmissao` varchar(10) DEFAULT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `dataadmissao`, `cargo`) VALUES
(1, 'Cleive', '10/10/20', 'Atendente'),
(2, 'Thais', '2022-06-', 'Atendente'),
(3, 'Murilo', '2022-06-', 'Gerente'),
(4, 'Diego M', '2022-06-02', 'ZÃ© Ruela'),
(5, 'Helena A. M.', '2021-02-05', 'GarÃ§onete'),
(6, 'HeloÃ­sa M. A', '2015-03-07', 'GarÃ§onete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Logradouro` varchar(50) DEFAULT NULL,
  `Numero` varchar(4) DEFAULT NULL,
  `Cidade` varchar(20) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Bairro` varchar(20) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `Situacao` varchar(15) DEFAULT NULL,
  `id_funcionario` int(11) NOT NULL,
  `Pais` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `nome_cliente`, `Tipo`, `Logradouro`, `Numero`, `Cidade`, `Estado`, `Bairro`, `CEP`, `Situacao`, `id_funcionario`, `Pais`) VALUES
(1, 'Sandro', 'Retirada', '', '', '', '', '', '', 'Pedido', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoitem`
--

CREATE TABLE `pedidoitem` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `SequenciaItem` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Extras` varchar(100) DEFAULT NULL,
  `precoUn` decimal(10,2) DEFAULT NULL,
  `situacao_item` varchar(20) DEFAULT 'Em Aberto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidoitem`
--

INSERT INTO `pedidoitem` (`id_pedido`, `id_produto`, `SequenciaItem`, `Quantidade`, `Extras`, `precoUn`, `situacao_item`) VALUES
(1, 9, 1, 1, 'com nada', '37.20', 'Em Aberto'),
(1, 7, 2, 2, 'borda recheada', '40.00', 'Em Aberto'),
(1, 3, 3, 1, 'na brasa', '35.00', 'Em Aberto');

--
-- Acionadores `pedidoitem`
--
DELIMITER $$
CREATE TRIGGER `altera_situacao_pedido` AFTER UPDATE ON `pedidoitem` FOR EACH ROW call procedure_altera_situacao_pedido (new.id_pedido)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_temporario`
--

CREATE TABLE `pedido_temporario` (
  `Sequência` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `Desconto` decimal(10,2) DEFAULT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Logradouro` varchar(50) DEFAULT NULL,
  `Numero` varchar(4) DEFAULT NULL,
  `Cidade` varchar(20) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Bairro` varchar(20) DEFAULT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `Situacao` varchar(10) DEFAULT NULL,
  `id_funcionario` int(11) NOT NULL,
  `Pais` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `sabor` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `sabor`, `preco`) VALUES
(1, 'Atum com palmito', '36.00'),
(2, 'Doce de leite condensado com pessego', '38.00'),
(3, 'Palmito com catupiry', '35.00'),
(4, 'Abobrinha com aveia', '47.01'),
(5, 'Abobrinha com requeijÃ£o', '38.40'),
(6, 'Al Capone', '35.10'),
(7, 'Alcachofra', '40.00'),
(8, 'Alho e Ã³leo', '43.60'),
(9, 'Alho Negro', '37.20'),
(10, 'Americana', '38.00'),
(11, 'Atum', '45.20'),
(12, 'Atum com cream cheese e alho-porÃ³', '46.50'),
(13, 'Atum com palmito', '47.00'),
(14, 'Banana nevada', '44.60'),
(15, 'Berinjela e abobrinha', '43.90'),
(16, 'Brigadeiro', '36.10'),
(17, 'BrÃ³colis e peito de peru', '40.70'),
(18, 'Caipira', '35.00'),
(19, 'Calabresa', '39.90'),
(20, 'Calabresa com cheddar', '29.00'),
(21, 'CalifÃ³rnia', '25.60'),
(22, 'CamarÃ£o', '25.80'),
(23, 'Canadense', '39.50'),
(24, 'Caprese', '27.40'),
(25, 'Carne moÃ­da', '31.10'),
(26, 'Carne seca com banana', '41.40'),
(27, 'Carne seca com cream cheese', '29.30'),
(28, 'Cebola caramelizada', '37.10'),
(29, 'Champignon e manjericÃ£o', '25.10'),
(30, 'Chocolate com morango', '39.90'),
(31, 'Confete', '33.10'),
(32, 'CoraÃ§Ã£o', '46.00'),
(33, 'Costela', '35.90'),
(34, 'Cream cheese com abobrinha', '36.60'),
(35, 'Escarola', '32.20'),
(36, 'Estrogonofe', '43.10'),
(37, 'Estrogonofe de frango', '46.10'),
(38, 'FilÃ© com alho', '34.90'),
(39, 'FilÃ© com cheddar', '38.50'),
(40, 'Francesa', '26.40'),
(41, 'Frango Ã  parmegiana', '34.00'),
(42, 'Frango com catupiry', '32.10'),
(43, 'Frango com cheddar', '47.80'),
(44, 'Frango com palmito', '39.80'),
(45, 'HambÃºrguer', '34.20'),
(46, 'Jardineira', '45.90'),
(47, 'Marguerita', '27.90'),
(48, 'Mexicana', '47.40'),
(49, 'Mista', '30.40'),
(50, 'MuÃ§arela', '30.30'),
(51, 'Napolitana', '38.60'),
(52, 'Palmito e BrÃ³colis', '41.90'),
(53, 'Palmito e champignon', '43.10'),
(54, 'PÃ£o de alho', '26.60'),
(55, 'Parma com rÃºcula', '34.40'),
(56, 'Peito de peru com cream cheese', '32.40'),
(57, 'Peito de peru e champignon', '40.00'),
(58, 'Pepperoni', '43.50'),
(59, 'Picanha ao alho e Ã³leo', '44.30'),
(60, 'PimentÃ£o e Azeitona', '34.20'),
(61, 'Portuguesa', '29.70'),
(62, 'Prestigio', '25.90'),
(63, 'Presunto com cheddar', '35.90'),
(64, 'Quatro queijos', '32.30'),
(65, 'Repolho', '28.30'),
(66, 'Romeu e Julieta', '44.20'),
(67, 'RÃºcula', '26.30'),
(68, 'Scamorza', '33.80'),
(69, 'Siciliana', '48.50'),
(70, 'Sorvete', '37.00'),
(71, 'Tribeca', '48.90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `TipoAcesso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `TipoAcesso`) VALUES
(4, 'teste', '1234', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `uk_cliente_CPF` (`CPF`),
  ADD UNIQUE KEY `uk_cliente_Celular` (`Celular`),
  ADD UNIQUE KEY `uk_cliente_Telefone_Fixo` (`Telefone_Fixo`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `Pedido_id_pedido_id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `pedidoitem`
--
ALTER TABLE `pedidoitem`
  ADD UNIQUE KEY `id_pedido` (`id_pedido`,`SequenciaItem`),
  ADD KEY `FK_SequenciaItem_id_pedido` (`id_pedido`),
  ADD KEY `FK_SequenciaItem_id_produto` (`id_produto`);

--
-- Índices para tabela `pedido_temporario`
--
ALTER TABLE `pedido_temporario`
  ADD PRIMARY KEY (`Sequência`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pedido_temporario`
--
ALTER TABLE `pedido_temporario`
  MODIFY `Sequência` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
