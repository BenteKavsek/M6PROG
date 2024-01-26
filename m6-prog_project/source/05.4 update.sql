update `imageTable` set uploadDateTime= DATE_ADD(uploadDateTime, INTERVAL -31 DAY);

update `imageTable` set uploadDateTime= DATE_ADD(CURRENT_DATE, INTERVAL -31 DAY);

update `imageTable` set uploadDateTime= DATE_ADD(uploadDateTime, INTERVAL -1 YEAR);