CREATE DATABASE IF NOT EXISTS `goeat`;
USE `goeat` ;

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `nif` VARCHAR(45) NOT NULL,
  `telemovel` VARCHAR(45) NOT NULL,
  `morada` INT NOT NULL,
  `estado` INT NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` VARCHAR(45) NOT NULL,
  `cliente` INT NOT NULL,
  `total` FLOAT NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `pratos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(250) NOT NULL,
  `preco` FLOAT NOT NULL,
  `imagem` VARCHAR(250) NOT NULL,
  `disponivel` INT NOT NULL,
  `tipo` INT NOT NULL,
  `restaurante` INT NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `encomenda_prato` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `encomenda` INT UNSIGNED NOT NULL,
  `prato` INT UNSIGNED NOT NULL,
  `quantidade` INT NOT NULL,
  `situacao` INT NOT NULL,
  PRIMARY KEY (`id`, `encomenda`, `prato`),
  CONSTRAINT `fk_encomendas_has_pratos_encomendas`
    FOREIGN KEY (`encomenda`)
    REFERENCES `goeat`.`encomendas` (`id`),
  CONSTRAINT `fk_encomendas_has_pratos_pratos1`
    FOREIGN KEY (`prato`)
    REFERENCES `goeat`.`pratos` (`id`));


CREATE TABLE IF NOT EXISTS `estados` (
  `id` INT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `moradas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NOT NULL,
  `numPorta` VARCHAR(45) NOT NULL,
  `codPostal` VARCHAR(45) NOT NULL,
  `localidade` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `perfis` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `nif` VARCHAR(45) NOT NULL,
  `telemovel` VARCHAR(45) NOT NULL,
  `morada` INT NOT NULL,
  `estado` INT NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `designacao` VARCHAR(90) NOT NULL,
  `abertura` TIME NOT NULL,
  `fecho` TIME NOT NULL,
  `url` VARCHAR(90) NOT NULL,
  `responsavel` VARCHAR(90) NOT NULL,
  `contactoResponsavel` VARCHAR(45) NOT NULL,
  `segunda` INT NOT NULL,
  `terca` INT NOT NULL,
  `quarta` INT NOT NULL,
  `quinta` INT NOT NULL,
  `sexta` INT NOT NULL,
  `sabado` INT NOT NULL,
  `domingo` INT NOT NULL,
  `mbway` INT NOT NULL,
  `visa` INT NOT NULL,
  `multibanco` INT NOT NULL,
  `numerario` INT NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `situacoes` (
  `id` INT NOT NULL,
  `situacao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS`tipos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `email` VARCHAR(512) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  `perfil` INT NOT NULL,
  `ativo` INT NOT NULL,
  `entidade` INT NOT NULL,
  PRIMARY KEY (`id`));
