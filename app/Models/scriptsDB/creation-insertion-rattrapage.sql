/* Script creation-insertion-rattrapage.sql */

-- creation de la table des rattrapages


CREATE TABLE rattrapages_sgrds (
    idRat serial primary key,
    etatRat varchar(50) NOT NULL CHECK (etatRat IN ('Programmé', 'Neutralisé', 'En attente')),
    dateRat date ,
    salleRat varchar(50) ,
    typeRat varchar(50) ,
    commRat text,
    dureeRat varchar(8) ,
    idDevoir INTEGER REFERENCES devoirs_sgrds(idDevoir) NOT NULL

);

-- insertion des rattrapages

-- Rattrapage 1

INSERT INTO rattrapages_sgrds (etatRat, dateRat, salleRat, typeRat, commRat, dureeRat, idDevoir) VALUES
('Programmé', '2024-04-05', '715', 'Machine', 'Rattrapage de la matière', '1h00', 1),
('En attente', null , null , null , null , null , 3),
('Neutralisé', null , null , null , null , null , 2);
