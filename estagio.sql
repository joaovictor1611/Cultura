-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/07/2016 às 13:31
-- Versão do servidor: 5.6.25-0ubuntu0.15.04.1
-- Versão do PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_interessado`
--

CREATE TABLE IF NOT EXISTS `tb_interessado` (
`idtb_interessado` int(10) unsigned NOT NULL,
  `nome_interessado` varchar(100) DEFAULT NULL,
  `orgao_interessado` varchar(100) DEFAULT NULL,
  `cpf_interessado` varchar(20) DEFAULT NULL,
  `cnpj_interessado` varchar(20) DEFAULT NULL,
  `bairro_interessado` varchar(50) DEFAULT NULL,
  `cidade_interessado` varchar(50) DEFAULT NULL,
  `endereco_interessado` varchar(100) DEFAULT NULL,
  `telefone_interessado` varchar(20) DEFAULT NULL,
  `email_interessado` varchar(100) DEFAULT NULL,
  `dat_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `tb_interessado`
--

INSERT INTO `tb_interessado` (`idtb_interessado`, `nome_interessado`, `orgao_interessado`, `cpf_interessado`, `cnpj_interessado`, `bairro_interessado`, `cidade_interessado`, `endereco_interessado`, `telefone_interessado`, `email_interessado`, `dat_reg`) VALUES
(1, 'Talysse', 'Secretaria de EducaÃ§Ã£o', '075.211.458-88', '', 'Baixa preta', 'Chorozinho', 'Rua Edilson Costa', '(85)98847-5889', '', '2016-07-21 10:39:40'),
(2, 'Gabi', 'JMF', '525.547.858-74', '', 'bairro', 'cidade', 'endereÃ§o', '(85)88788-5254', '', '2016-07-21 10:51:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_processo`
--

CREATE TABLE IF NOT EXISTS `tb_processo` (
`idtb_processo` int(10) unsigned NOT NULL,
  `tb_usuario_idtb_usuario` int(10) unsigned NOT NULL,
  `tb_interessado_idtb_interessado` int(10) unsigned NOT NULL,
  `assunto_processo` varchar(50) DEFAULT NULL,
  `texto_processo` varchar(2000) DEFAULT NULL,
  `data_processo` varchar(20) DEFAULT NULL,
  `dat_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_processo` int(11) DEFAULT NULL,
  `doc_processo` varchar(50) NOT NULL,
  `numdoc_processo` int(11) NOT NULL,
  `user_envio` int(11) NOT NULL,
  `num_processo` int(30) NOT NULL,
  `despacho_processo` varchar(2000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Fazendo dump de dados para tabela `tb_processo`
--

INSERT INTO `tb_processo` (`idtb_processo`, `tb_usuario_idtb_usuario`, `tb_interessado_idtb_interessado`, `assunto_processo`, `texto_processo`, `data_processo`, `dat_reg`, `status_processo`, `doc_processo`, `numdoc_processo`, `user_envio`, `num_processo`, `despacho_processo`) VALUES
(29, 2, 1, 'Teste 30', 'Teste 30', '22-07-2016', '2016-07-26 12:44:06', 2, 'rg', 854725, 3, 22074710, 'Teste despacho'),
(30, 3, 2, 'Teste despacho 45', 'Teste despacho 45', '22-07-2016', '2016-07-26 12:35:08', 1, 'rg', 201, 2, 22071642, 'Teste despacho 45'),
(31, 3, 2, 'teste 254', 'teste 254', '22-07-2016', '2016-07-26 12:35:08', 1, 'rg', 345, 2, 22071723, 'teste 254'),
(35, 2, 1, 'Teste 30 ', 'Teste 30 ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg ', 854725, 4, 22074710, 'Teste despacho 3 '),
(36, 3, 0, 'Teste 30 ', 'Teste 30 ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg ', 854725, 2, 22074710, 'Despacho repetido'),
(37, 3, 0, 'Teste 30 ', 'Teste 30 ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg ', 854725, 2, 22074710, 'Despacho repetido 2'),
(38, 3, 1, 'Teste 30 ', 'Teste 30 ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg ', 854725, 2, 22074710, 'Despacho repetido 4'),
(39, 3, 0, 'Teste 30  ', 'Teste 30  ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg  ', 854725, 4, 22074710, 'Despacho 55'),
(40, 4, 0, 'Teste 30  ', 'Teste 30  ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg  ', 854725, 2, 22074710, 'Despacho 56'),
(41, 4, 1, 'Teste 30  ', 'Teste 30  ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg  ', 854725, 2, 22074710, 'Despacho 57'),
(42, 4, 0, 'Teste 30  ', 'Teste 30  ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg  ', 854725, 2, 22074710, 'despacho 58'),
(43, 4, 1, 'Teste 30  ', 'Teste 30  ', '25-07-2016', '2016-07-26 12:35:50', 2, 'rg  ', 854725, 3, 22074710, 'Despacho 59'),
(44, 4, 1, 'Teste 30   ', 'Teste 30   ', '25-07-2016', '2016-07-26 12:44:06', 2, 'rg   ', 854725, 1, 22074710, 'Teste despacho 2000'),
(45, 2, 1, 'Teste 2000', 'olÃ¡ aksksksksksksksks', '26-07-2016', '2016-07-26 12:35:08', 1, 'rg', 1231231, 3, 26071239, 'Processo tal tal tal'),
(46, 2, 2, 'Teste processo', 'Teste processo', '26-07-2016', '2016-07-26 16:34:32', 1, 'nota fiscal', 220152011, 3, 26073341, 'Esse Ã© o teste do processo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
`idtb_usuario` int(10) unsigned NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `orgao_usuario` varchar(100) DEFAULT NULL,
  `status_usuario` int(10) unsigned DEFAULT NULL,
  `tipo_usuario` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idtb_usuario`, `nome_usuario`, `senha_usuario`, `email_usuario`, `orgao_usuario`, `status_usuario`, `tipo_usuario`) VALUES
(1, 'Marcos', '123456', 'marcos@gmail.com', 'Secretaria de Cultura', 1, 'ADM'),
(2, 'Oneide', '123456', 'oneide@gmail.com', 'arte e terapia', 1, 'USER'),
(3, 'Nazare', '123456', 'nazare@gmail', 'JMF', 1, 'USER'),
(4, 'JoÃ£o', '123456', 'joao@gmail.com', 'Realeza', 1, 'USER'),
(5, 'Gabrielle', '123456', 'gabi@gmail.com', 'SubÃºrbio', 2, 'USER');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_interessado`
--
ALTER TABLE `tb_interessado`
 ADD PRIMARY KEY (`idtb_interessado`);

--
-- Índices de tabela `tb_processo`
--
ALTER TABLE `tb_processo`
 ADD PRIMARY KEY (`idtb_processo`), ADD KEY `tb_processo_FKIndex1` (`tb_interessado_idtb_interessado`), ADD KEY `tb_processo_FKIndex2` (`tb_usuario_idtb_usuario`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
 ADD PRIMARY KEY (`idtb_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_interessado`
--
ALTER TABLE `tb_interessado`
MODIFY `idtb_interessado` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `tb_processo`
--
ALTER TABLE `tb_processo`
MODIFY `idtb_processo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
MODIFY `idtb_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
