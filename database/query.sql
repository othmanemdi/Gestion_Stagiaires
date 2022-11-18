create database gestion_stagiaires;

show databases;

-- Attention !!!
drop gestion_stagiaires;

use gestion_stagiaires;

CREATE TABLE stagiaires (
    id int,
    nom varchar(100),
    note int,
    age int
);

show columns from stagiaires;

ALTER TABLE stagiaires
ADD salaire decimal;

ALTER TABLE stagiaires
DROP COLUMN salaire;


ALTER TABLE stagiaires
ADD PRIMARY KEY (id);

ALTER TABLE stagiaires AUTO_INCREMENT=1;

-- ALTER TABLE stagiaires AUTO_INCREMENT = 100;

ALTER TABLE `stagiaires` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

INSERT INTO stagiaires ( nom, note, age)
VALUES ( 'Nabila', 10, 23);

INSERT INTO stagiaires ( nom, note, age)
VALUES ( 'Maryam', 4, 23);

INSERT INTO stagiaires ( nom, note, age)
VALUES ( 'Hind', 8, 21);

INSERT INTO stagiaires ( nom, note, age)
VALUES
( 'Sara', 10, 21),
( 'Youssra', 2, 21);

UPDATE stagiaires SET note = 5 WHERE id = 2;
UPDATE stagiaires SET note = 7 WHERE id != 2;

UPDATE stagiaires SET note = note - 3 WHERE id IN(1,3,5);

-- Add a new column is_active2
ALTER TABLE `stagiaires` ADD `is_active2` BOOLEAN NOT NULL DEFAULT TRUE;
-- Delete column is_active2
ALTER TABLE `stagiaires` DROP `is_active2`;

ALTER TABLE `stagiaires` CHANGE `is_active` `deleted_at` DATETIME(1) NULL DEFAULT NULL;

