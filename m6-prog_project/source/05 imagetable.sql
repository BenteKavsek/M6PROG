USE: - use m6prog;

CREATE TABLE `imageTable` (
  `idImage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uploadDateTime` DATETIME() NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` VARCHAR(10)  NOT NULL,
  `fileNaam` VARCHAR(100) NOT NULL,
  `fileLink` VARCHAR(50) NOT NULL,
)