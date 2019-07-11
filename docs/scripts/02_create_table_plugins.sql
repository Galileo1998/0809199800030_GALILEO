CREATE TABLE `plugins` (
  `efggm_idplugins` BIGINT(15) NOT NULL AUTO_INCREMENT,
  `efggm_plugin` VARCHAR(128) NULL,
  `efggm_estado` CHAR(3) NULL,
  `efggm_urlhomepage` VARCHAR(128) NULL,
  `efggm_urlcdn` VARCHAR(128) NULL,
  PRIMARY KEY (`efggm_idplugins`));
