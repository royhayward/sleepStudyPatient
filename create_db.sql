



-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Patient'
-- 
-- ---

DROP TABLE IF EXISTS `Patient`;
		
CREATE TABLE `Patient` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `FirstName` VARCHAR(255) NOT NULL,
  `LastName` VARCHAR(255) NOT NULL,
  `MiddleInitial` VARCHAR(1) NULL DEFAULT NULL,
  `SSN` VARCHAR(11) NOT NULL,
  `DOB` DATE NOT NULL,
  `VirtOXID` VARCHAR(100) NULL DEFAULT NULL,
  `ShippingAddress` VARCHAR(255) NOT NULL,
  `City` VARCHAR(255) NOT NULL,
  `State` VARCHAR(50) NOT NULL,
  `Zip` VARCHAR(50) NOT NULL,
  `Phone` VARCHAR(25) NOT NULL DEFAULT 'NULL',
  `Gender` VARCHAR(1) NOT NULL,
  `Height_feet` INT(10) NOT NULL,
  `Height_inch` TINYINT(5) NOT NULL,
  `Weight` INT(5) NOT NULL,
  `NeckSize` INT(5) NOT NULL,
  `id_Insurance` BIGINT NULL DEFAULT NULL,
  `Insurance_ID` VARCHAR(100) NULL DEFAULT NULL,
  `id_PCP` BIGINT NULL DEFAULT NULL,
  `id_SleepCenter` BIGINT NULL DEFAULT NULL,
  `id_DME` BIGINT NULL DEFAULT NULL,
  `id_Dentist` BIGINT NULL DEFAULT NULL,
  `created_date` TIMESTAMP NOT NULL,
  `last_updated` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Documents'
-- 
-- ---

DROP TABLE IF EXISTS `Documents`;
		
CREATE TABLE `Documents` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_Patient` BIGINT NULL DEFAULT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `content` LONGBLOB NOT NULL,
  `tags` TEXT(255) NULL DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `date_loaded` TIMESTAMP NOT NULL,
  `id_Doc_Types` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'PCP'
-- 
-- ---

DROP TABLE IF EXISTS `PCP`;
		
CREATE TABLE `PCP` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `FirstName` VARCHAR(255) NOT NULL,
  `LastName` VARCHAR(255) NOT NULL,
  `NPI` VARCHAR(255) NOT NULL,
  `EIN` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'SleepCenter'
-- 
-- ---

DROP TABLE IF EXISTS `SleepCenter`;
		
CREATE TABLE `SleepCenter` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Name` VARCHAR(255) NOT NULL DEFAULT ' ',
  `NPI` VARCHAR(255) NOT NULL,
  `EIN` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'DME'
-- 
-- ---

DROP TABLE IF EXISTS `DME`;
		
CREATE TABLE `DME` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `NPI` VARCHAR(255) NOT NULL,
  `EIN` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Dentist'
-- 
-- ---

DROP TABLE IF EXISTS `Dentist`;
		
CREATE TABLE `Dentist` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `NPI` VARCHAR(255) NOT NULL,
  `EIN` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'User'
-- 
-- ---

DROP TABLE IF EXISTS `User`;
		
CREATE TABLE `User` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `username` VARCHAR(100) NOT NULL DEFAULT 'NULL',
  `role` INT NOT NULL DEFAULT 0,
  `pass` VARCHAR(255) NOT NULL DEFAULT 'NULL',
  `status` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'PatientNotes'
-- 
-- ---

DROP TABLE IF EXISTS `PatientNotes`;
		
CREATE TABLE `PatientNotes` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_Patient` BIGINT NULL DEFAULT NULL,
  `date` TIMESTAMP NOT NULL,
  `Note` MEDIUMTEXT NOT NULL,
  `tags` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Patient_Symptoms'
-- 
-- ---

DROP TABLE IF EXISTS `Patient_Symptoms`;
		
CREATE TABLE `Patient_Symptoms` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_Patient` BIGINT NULL DEFAULT NULL,
  `id_Symptoms` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Symptoms'
-- 
-- ---

DROP TABLE IF EXISTS `Symptoms`;
		
CREATE TABLE `Symptoms` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Symptom` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Study'
-- 
-- ---

DROP TABLE IF EXISTS `Study`;
		
CREATE TABLE `Study` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `date` TIMESTAMP NOT NULL,
  `id_Patient` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Study_Indications'
-- 
-- ---

DROP TABLE IF EXISTS `Study_Indications`;
		
CREATE TABLE `Study_Indications` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_Indications` BIGINT NULL DEFAULT NULL,
  `id_Study` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Indications'
-- 
-- ---

DROP TABLE IF EXISTS `Indications`;
		
CREATE TABLE `Indications` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `indication` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Physician_Request'
-- 
-- ---

DROP TABLE IF EXISTS `Physician_Request`;
		
CREATE TABLE `Physician_Request` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `date` TIMESTAMP NOT NULL,
  `id_Patient` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Physician_Request_Requested'
-- 
-- ---

DROP TABLE IF EXISTS `Physician_Request_Requested`;
		
CREATE TABLE `Physician_Request_Requested` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_Requested` BIGINT NULL DEFAULT NULL,
  `id_Physician_Request` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Requested'
-- 
-- ---

DROP TABLE IF EXISTS `Requested`;
		
CREATE TABLE `Requested` (
  `id` BIGINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Request` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Doc_Types'
-- 
-- ---

DROP TABLE IF EXISTS `Doc_Types`;
		
CREATE TABLE `Doc_Types` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `Type` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'Insurance'
-- 
-- ---

DROP TABLE IF EXISTS `Insurance`;
		
CREATE TABLE `Insurance` (
  `id` INT NULL AUTO_INCREMENT DEFAULT NULL,
  `Name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `Patient` ADD FOREIGN KEY (id_Insurance) REFERENCES `Insurance` (`id`);
ALTER TABLE `Patient` ADD FOREIGN KEY (id_PCP) REFERENCES `PCP` (`id`);
ALTER TABLE `Patient` ADD FOREIGN KEY (id_SleepCenter) REFERENCES `SleepCenter` (`id`);
ALTER TABLE `Patient` ADD FOREIGN KEY (id_DME) REFERENCES `DME` (`id`);
ALTER TABLE `Patient` ADD FOREIGN KEY (id_Dentist) REFERENCES `Dentist` (`id`);
ALTER TABLE `Documents` ADD FOREIGN KEY (id_Patient) REFERENCES `Patient` (`id`);
ALTER TABLE `Documents` ADD FOREIGN KEY (id_Doc_Types) REFERENCES `Doc_Types` (`id`);
ALTER TABLE `PatientNotes` ADD FOREIGN KEY (id_Patient) REFERENCES `Patient` (`id`);
ALTER TABLE `Patient_Symptoms` ADD FOREIGN KEY (id_Patient) REFERENCES `Patient` (`id`);
ALTER TABLE `Patient_Symptoms` ADD FOREIGN KEY (id_Symptoms) REFERENCES `Symptoms` (`id`);
ALTER TABLE `Study` ADD FOREIGN KEY (id_Patient) REFERENCES `Patient` (`id`);
ALTER TABLE `Study_Indications` ADD FOREIGN KEY (id_Indications) REFERENCES `Indications` (`id`);
ALTER TABLE `Study_Indications` ADD FOREIGN KEY (id_Study) REFERENCES `Study` (`id`);
ALTER TABLE `Physician_Request` ADD FOREIGN KEY (id_Patient) REFERENCES `Patient` (`id`);
ALTER TABLE `Physician_Request_Requested` ADD FOREIGN KEY (id_Requested) REFERENCES `Requested` (`id`);
ALTER TABLE `Physician_Request_Requested` ADD FOREIGN KEY (id_Physician_Request) REFERENCES `Physician_Request` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Patient` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Documents` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `PCP` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `SleepCenter` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `DME` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Dentist` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `User` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `PatientNotes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Patient_Symptoms` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Symptoms` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Study` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Study_Indications` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Indications` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Physician_Request` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Physician_Request_Requested` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Requested` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Doc_Types` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Insurance` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Patient` (`id`,`First Name`,`LastName`,`MiddleInitial`,`DOB`,`VirtOXID`,`Shipping Address`,`City`,`State`,`Zip`,`Phone`,`Gender`,`Height_feet`,`Height_inch`,`Weight`,`NeckSize`,`Insurance`,`Insurance_ID`,`id_PCP`,`id_SleepCenter`,`id_DME`,`id_Dentist`,`created_date`,`last_updated`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `Documents` (`id`,`id_Patient`,`Name`,`content`,`tags`,`title`,`date_loaded`,`id_Doc_Types`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `PCP` (`id`,`FirstName`,`LastName`,`NPI`,`EIN`) VALUES
-- ('','','','','');
-- INSERT INTO `SleepCenter` (`id`,`Name`,`NPI`,`EIN`) VALUES
-- ('','','','');
-- INSERT INTO `DME` (`id`,`Name`,`NPI`,`EIN`) VALUES
-- ('','','','');
-- INSERT INTO `Dentist` (`id`,`Name`,`NPI`,`EIN`) VALUES
-- ('','','','');
INSERT INTO `User` (`username`,`role`,`pass`,`status`) VALUES
 ('admin@localhost',1,'bc89138f5b79a31bdcbe2eaffd5d8bc7',1);
-- INSERT INTO `PatientNotes` (`id`,`id_Patient`,`date`,`Note`,`tags`) VALUES
-- ('','','','','');
-- INSERT INTO `Patient_Symptoms` (`id`,`id_Patient`,`id_Symptoms`) VALUES
-- ('','','');
INSERT INTO `Symptoms` ( `Symptom`, `active`) VALUES
('Witnessed Apnea', 1),
('Excessive Daytime Sleepiness', 1),
('Decreased Intimacy', 1),
('Hypertension', 1),
('Obesity', 1),
('Insomnia', 1),
('History of Stroke', 1),
('Diabetes', 1),
('Mood Disorders', 1),
('High Cholesterol', 1);
-- INSERT INTO `Study` (`id`,`date`,`id_Patient`) VALUES
-- ('','','');
-- INSERT INTO `Study_Indications` (`id`,`id_Indications`,`id_Study`) VALUES
-- ('','','');
INSERT INTO `Indications` (`indication`, `active`) VALUES
('Excessive Daytime Sleepiness, Hypersomnia (780.54)', 1),
('Snoring/Unspecified Sleep Disturbance (780.50)', 1),
('PLM/RLS (restless Legs) (327.51)', 1),
('Complex/Central Sleep Apnea (327.21)', 1),
('Sleep disordered Breathing/Unspecified Sleep Apnea (780.57)', 1),
('Sleep Related Hypoventilation/Hypoxemia (327.26)', 1),
('Obstructive Sleep Apnea (327.26)', 1),
('Narcolepsy', 1);
-- INSERT INTO `Physician_Request` (`id`,`date`,`id_Patient`) VALUES
-- ('','','');
-- INSERT INTO `Physician_Request_Requested` (`id`,`id_Requested`,`id_Physician_Request`) VALUES
-- ('','','');
-- INSERT INTO `Requested` (`id`,`Request`,`active`) VALUES
-- ('','','');
INSERT INTO `Doc_Types` ( `Type`, `active`) VALUES
('doc', 1),
('xls', 1),
('pdf', 1);

