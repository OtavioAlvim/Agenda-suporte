-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.33 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para calendario2
CREATE DATABASE IF NOT EXISTS `calendario2` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `calendario2`;

-- Copiando estrutura para tabela calendario2.analistas
CREATE TABLE IF NOT EXISTS `analistas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.analistas: ~4 rows (aproximadamente)
INSERT INTO `analistas` (`id`, `nome`) VALUES
	(1, 'PADRAO');

-- Copiando estrutura para tabela calendario2.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `senha_dia` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.config: ~1 rows (aproximadamente)
INSERT INTO `config` (`id`, `senha_dia`) VALUES
	(1, 'FE888454');

-- Copiando estrutura para tabela calendario2.estagios_implantacao
CREATE TABLE IF NOT EXISTS `estagios_implantacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT 'ABERTO',
  `id_ticket` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.estagios_implantacao: ~98 rows (aproximadamente)

-- Copiando estrutura para tabela calendario2.implantacao
CREATE TABLE IF NOT EXISTS `implantacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `responsavel` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'ABERTO',
  `ticket` int NOT NULL DEFAULT '0',
  `data_inicio` varchar(50) NOT NULL DEFAULT '0',
  `data_fim` varchar(50) NOT NULL DEFAULT '0',
  `tipo` varchar(50) DEFAULT 'IMPLANTACAO',
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.implantacao: ~25 rows (aproximadamente)

-- Copiando estrutura para tabela calendario2.meses
CREATE TABLE IF NOT EXISTS `meses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.meses: ~12 rows (aproximadamente)
INSERT INTO `meses` (`id`, `mes`) VALUES
	(1, 'janeiro'),
	(2, 'fevereiro'),
	(3, 'marco'),
	(4, 'abril'),
	(5, 'maio'),
	(6, 'junho'),
	(7, 'julho'),
	(8, 'agosto'),
	(9, 'setembro'),
	(10, 'outubro'),
	(11, 'novembro'),
	(12, 'dezembro');

-- Copiando estrutura para tabela calendario2.nivel_evento
CREATE TABLE IF NOT EXISTS `nivel_evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `numero_nivel` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.nivel_evento: ~4 rows (aproximadamente)
INSERT INTO `nivel_evento` (`id`, `descricao`, `numero_nivel`) VALUES
	(1, 'NIVEL BAIXO', 1),
	(2, 'NIVEL MEDIO', 2),
	(3, 'INTERMEDIARIO', 5),
	(4, 'DIFICIL', 10);

-- Copiando estrutura para tabela calendario2.responsavel
CREATE TABLE IF NOT EXISTS `responsavel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.responsavel: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela calendario2.sistema
CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.sistema: ~6 rows (aproximadamente)
INSERT INTO `sistema` (`id`, `descricao`) VALUES
	(1, 'GESTOR'),
	(2, 'GESTOR-FOOD'),
	(3, 'GESTOR-AGRO'),
	(4, 'GESTOR-SALAO'),
	(5, 'SIA'),
	(6, 'COMPILART');

-- Copiando estrutura para tabela calendario2.tarefas
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `ressponsavel` varchar(50) DEFAULT NULL,
  `ticket` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'ABERTO',
  `data_inicio` varchar(50) NOT NULL DEFAULT '0',
  `data_fim` varchar(50) NOT NULL DEFAULT '0',
  `cancelado` char(1) DEFAULT 'N',
  `tipo` varchar(50) DEFAULT ' TAREFA',
  `descricao_nivel` varchar(50) DEFAULT NULL,
  `numero_nivel` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.tarefas: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela calendario2.tipo_primitivo_implantacao
CREATE TABLE IF NOT EXISTS `tipo_primitivo_implantacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `id_nivel_evento` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipo_primitivo_implantacao_nivel_evento` (`id_nivel_evento`),
  CONSTRAINT `FK_tipo_primitivo_implantacao_nivel_evento` FOREIGN KEY (`id_nivel_evento`) REFERENCES `nivel_evento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.tipo_primitivo_implantacao: ~8 rows (aproximadamente)
INSERT INTO `tipo_primitivo_implantacao` (`id`, `descricao`, `id_nivel_evento`) VALUES
	(1, 'migracao', 4),
	(2, 'treinamento', 3),
	(3, 'arquivos fiscais', 3),
	(4, 'feedback', 3),
	(5, 'não fiscais', 2),
	(6, 'instalacao', 4),
	(7, 'acompanhamento', 4),
	(8, 'tarefa', 1);

-- Copiando estrutura para tabela calendario2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `senha` varchar(50) NOT NULL DEFAULT '',
  `grupo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela calendario2.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `grupo`) VALUES
	(1, 'PADRAO', 'master', 'admin', 'adm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
