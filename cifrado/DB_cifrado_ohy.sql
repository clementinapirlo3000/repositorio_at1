#  Creado con Kata Kuntur - Modelador de Datos
#  Versión: 2.5.2
#  Sitio Web: http://katakuntur.jeanmazuelos.com/
#  Si usted encuentra algún error le agradeceriamos lo reporte en:
#  http://pm.jeanmazuelos.com/katakuntur/issues/new

#  Administrador de Base de Datos: MySQL/MariaDB
#  Diagrama: sis_cif
#  Autor: 
#  Fecha y hora: 27/10/2016 15:18:25

# GENERANDO TABLAS
CREATE TABLE `scf_us_01` (
	`scfus_id` INTEGER NOT NULL,
	`scfus_nom` VARCHAR(80) NOT NULL,
	`scfus_ape` VARCHAR(80) NOT NULL,
	`scfus_nac` CHAR(1) NOT NULL,
	`scfus_fec` DATE NOT NULL,
	`scfus_em` VARCHAR(100) NOT NULL,
	`scfus_ctlf` INTEGER(7) NOT NULL,
	`scfus_tlf` INTEGER(4) NOT NULL,
	`scfus_nus` VARCHAR(50) NOT NULL,
	`scfus_clci` VARCHAR(1000) NOT NULL,
	`scfus_cllg` VARCHAR(100) NOT NULL,
	`scfus_cd` VARCHAR(10) NOT NULL,
	`scfus_st` INTEGER(1) NOT NULL,
	PRIMARY KEY(`scfus_id`)
) ENGINE=INNODB;
CREATE TABLE `scf_cnt_02` (
	`scfcnt_id` INTEGER NOT NULL,
	`scfcnt_cr` LONGTEXT NOT NULL,
	`scfcnt_us` LONGTEXT NOT NULL,
	`scfcnt_ct` LONGTEXT NOT NULL,
	`scfcnt_dsc` LONGTEXT NOT NULL,
	`scfcnt_ob` LONGTEXT NOT NULL,
	`scfcnt_st` INTEGER(1) NOT NULL,
	`fk_scfus_id` INTEGER NOT NULL,
	KEY(`fk_scfus_id`),
	PRIMARY KEY(`scfcnt_id`)
) ENGINE=INNODB;
CREATE TABLE `scf_lg_03` (
	`scflg_id` INTEGER NOT NULL,
	`scflg_dn` LONGTEXT NOT NULL,
	`scflg_dv` LONGTEXT NOT NULL,
	`scflg_fc` VARCHAR(60) NOT NULL,
	`scflg_dscp` LONGTEXT NOT NULL,
	`scflg_evnt` CHAR(10) NOT NULL,
	`fk_scfus_id` INTEGER NOT NULL,
	KEY(`fk_scfus_id`),
	PRIMARY KEY(`scflg_id`)
) ENGINE=INNODB;
CREATE TABLE `scf_prc_04` (
	`scfprc_id` INTEGER NOT NULL,
	`scfprc_ds` VARCHAR(20) NOT NULL,
	`fk_scfcnt_id` INTEGER NOT NULL,
	KEY(`fk_scfcnt_id`),
	PRIMARY KEY(`scfprc_id`)
) ENGINE=INNODB;

# GENERANDO RELACIONES
ALTER TABLE `scf_cnt_02` ADD CONSTRAINT `scf_cnt_02_scf_us_01_fk_scfus_id` FOREIGN KEY (`fk_scfus_id`) REFERENCES `scf_us_01`(`scfus_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `scf_lg_03` ADD CONSTRAINT `scf_lg_03_scf_us_01_fk_scfus_id` FOREIGN KEY (`fk_scfus_id`) REFERENCES `scf_us_01`(`scfus_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `scf_prc_04` ADD CONSTRAINT `scf_prc_04_scf_cnt_02_fk_scfcnt_id` FOREIGN KEY (`fk_scfcnt_id`) REFERENCES `scf_cnt_02`(`scfcnt_id`) ON DELETE NO ACTION ON UPDATE CASCADE;