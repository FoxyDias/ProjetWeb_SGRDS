/* Script creation-insertion-rattrapage.sql */

-- creation de la table des rattrapages


CREATE TABLE rattrapages_sgrds (
    idRat serial primary key,
    etatRat varchar(50) NOT NULL,
    dateRat date NOT NULL,
    salleRat varchar(50) NOT NULL,
    typeRat varchar(50) NOT NULL,
    commRat text,
    dureeRat varchar(8) NOT NULL,
    idDevoir INTEGER REFERENCES devoirs_sgrds(idDevoir) NOT NULL

);

-- insertion des rattrapages

-- Rattrapage 1
/*
INSERT INTO rattrapages_sgrds (etatRat, dateRat, salleRat, typeRat, commRat, dureeRat, idDevoir) VALUES
    ('En attente', '2021-01-01', 'A1', 'Machine', 'Rattrapage de la matière', '1h00', 1);
*/