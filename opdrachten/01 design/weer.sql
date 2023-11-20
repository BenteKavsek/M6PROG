CREATE SCHEMA `weer`; -- maakt een nieuw schema (database)
USE `weer`; -- selecteerd dat schema (anders kan de database de tabellen niet vinden)

CREATE TABLE `weersomstandighedenPerDag`
(
    `idWeersomstandighedenPerDag` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `datum` DATE NOT NULL,
    `plaats` VARCHAR(20) NOT NULL,
    `aantalGraden` DECIMAL NOT NULL,
    `windKracht` INT NOT NULL,
    `regenInMilimeters` INT NOT NULL,

    PRIMARY KEY (`idWeersomstandighedenPerDag`),
    UNIQUE INDEX `idWeersomstandighedenPerDag_UNIQUE` (`idWeersomstandighedenPerDag` ASC) VISIBLE
)