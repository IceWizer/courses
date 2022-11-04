DROP DATABASE IF EXISTS ListeDeCourse;

CREATE DATABASE ListeDeCourse;

USE ListeDeCourse;

CREATE TABLE IF NOT EXISTS `Produit` (
  `identifier` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
