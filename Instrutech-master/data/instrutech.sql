-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2023 às 20:23
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.28

DROP DATABASE instrutech;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `instrutech`
--
CREATE DATABASE IF NOT EXISTS instrutech;
USE instrutech;

-- --------------------------------------------------------
--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) AUTO_INCREMENT NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(40) NOT NULL,
  `num` varchar(25) NOT NULL,
  `bairro` varchar(25) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` enum('AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO') NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `privilegio` enum('compra', 'venda', 'admin') NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idproduto` int(11) AUTO_INCREMENT NOT NULL,
  `foto` longtext NOT NULL,
  `nome` varchar(35) NOT NULL,
  `descricao` longtext  NOT NULL,
  `marca` varchar(35) NOT NULL,
  `valor` decimal(10, 2) NOT NULL,
  `estado` enum('novo','usado') NOT NULL,
  `tipo` enum('venda','aluguel') NOT NULL,
  `destaque` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idpedido` int(11) AUTO_INCREMENT NOT NULL,
  `datapedido` date NOT NULL,
  `valortotal` decimal(10, 2) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `idcliente` (`idcliente`),
  KEY `idproduto` (`idproduto`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DELETE FROM `cliente`;
DELETE FROM `produto`;

ALTER TABLE `cliente` AUTO_INCREMENT = 1;

INSERT INTO cliente ( nome, cep, endereco, num, bairro, cidade, estado, email, senha, privilegio) 
            VALUES ('Administrador', 123456789,  "Rua 0", 0, "Tijuca", 'Rio de Janeiro', 'RJ', 'admin@instrutech.com', md5(12345678), 'admin');
INSERT INTO cliente ( nome, cep, endereco, num, bairro, cidade, estado, email, senha, privilegio) 
            VALUES ('Marcus Vinicius', 123456789,  "Rua B. de Jaceguai", 0, "Ponta d'Areia", 'Niteroi', 'RJ', 'marcusvinicius2747@gmail.com', md5(12345678), 'admin');
INSERT INTO cliente (nome, cep, endereco, num, bairro, cidade, estado, email, senha, privilegio) 
            VALUES ('Gabigol', 987654321,  "Rua da Artilharia", 9, "Leblon", 'Rio de Janeiro', 'RJ', 'lilgabi@mengo.com', md5(12345678), 'compra');
INSERT INTO cliente (nome, cep, endereco, num, bairro, cidade, estado, email, senha, privilegio) 
            VALUES ('James Bond', 23145678,  "Rua Skyfall", 9, "Tijuca", 'Rio de Janeiro', 'RJ', 'bond@007.com', md5(12345678), 'venda');

ALTER TABLE `produto` AUTO_INCREMENT = 1;

INSERT INTO produto (foto, nome, descricao, marca, valor, estado, tipo, destaque) 
VALUES 
('https://www.gov.br/funai/pt-br/assuntos/noticias/2022-02/cultura-saiba-mais-sobre-o-maraca-instrumento-musical-indigena/chocalhos_karaja.jpg/@@images/d7d6f961-6174-4b85-8cb1-e361a98f2dee.jpeg', 'Chocalho Maraca', "O maraca e um dos instrumentos musicais indigenas mais conhecidos, sendo seu nome muitas vezes utilizado como um nome generico para chocalhos. Consiste numa cabaca seca e oca com pequenas pedras, carocos ou sementes em seu interior, colocada na extremidade de um bastao, normalmente feito de madeira.", "Funai", "1000", 'usado', 'venda', 1), 
('https://media.istockphoto.com/id/520688715/pt/foto/saxofone-alto-vista-lateral-em-fundo-branco.jpg?s=1024x1024&w=is&k=20&c=DeSHOTVRZRN47Dli7ZHySDn0iaPlRssbzF2u1rxFsTs=', "Saxofone", "O saxofone e um instrumento de sopro da família das madeiras que, curiosamente, ao contrario de todos os outros instrumentos desta familia, nunca foi construido com este material. Fabricado em metal, possui um longo tubo com uma curvatura e se utiliza de uma palheta simples. Nao faz parte dos instrumentos da orquestra, mas por possuir um som potente, foi adotado em bandas militares e em grupos populares, especialmente os de jazz.", "Yamaha", '750', 'novo', 'aluguel', 0), 
('https://fujisom.com.br/uploads/produto_fotos/20210913114251_fender.png', 'Guitarra Eletrica','Guitarra eletrica modelo Stratocaster, ideal para musicos profissionais. Possui corpo em mogno, captadores de alta qualidade e design moderno.','Fender', 1999.99, 'novo', 'venda', 1),
('https://http2.mlstatic.com/D_NQ_NP_654813-MLA50109939044_052022-O.webp','Teclado Digital','Teclado digital com 61 teclas sensiveis ao toque, diversos timbres e ritmos programaveis. Perfeito para iniciantes e musicos intermediarios.','Yamaha',699.99, 'novo','venda', 0), 
('https://a-static.mlcdn.com.br/800x560/bateria-acustica-pearl-exx725sp-c760-exx-725-shell-pack/cheirodemusica1/16011069008/c132dd1dad31a5116c73e702a0d114dc.jpeg','Bateria Acustica','Bateria acustica profissional de 5 pecas, construida em madeira de alta qualidade. Acompanha pratos, pedais e banco.','Pearl', 2999.99,'usado','venda', 1);
