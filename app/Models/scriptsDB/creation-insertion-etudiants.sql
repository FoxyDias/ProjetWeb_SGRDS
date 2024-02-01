/* Script creation-insertion-etudiants.sql */

-- creation de la table des etudiants

CREATE TABLE etudiants_sgrds (
    idEtu serial primary key,
    nomEtu varchar(50) NOT NULL,
    prenomEtu varchar(50) NOT NULL,
    adrEtu varchar(255) NOT NULL,
    promoEtu  integer NOT NULL

);

-- insertion des etudiants

INSERT INTO etudiants_sgrds (nomEtu, prenomEtu, adrEtu, promoEtu) VALUES
-- etudiants BUT 1
('HERAMBERT', 'Ted','ted.herambert@etu.univ-lehavre.fr',1),
('NOTERIS', 'Arthur', 'arthur.noteris@etu.univ-lehavre.fr',1),
('RAVENEL','Martin','martin.ravenel@etu.univ-lehavre.fr',1),
('VIEZ','Remi', 'remi.viez@etu.univ-lehavre.fr',1),
-- etudiant BUT 2
('CHAMPVILLARD','Sebastien','sebastien.champvillard@etu.univ-lehavre.fr',2),
('GALMANT','Maxime','maxime.galmant@etu.univ-lehavre.fr',2),
('DUNET','Tom','tom.dunet@etu.univ-lehavre.fr',2),
('LECOMTE','Arthur','arthur.lecompte@etu.univ-lehavre.fr',2),
-- etudiant BUT 3
('ROCHA','Anthony','anthony.rocha@etu.univ-lehavre.fr',3),
('CLACCIN','Noemie','noemie.claccin@etu.univ-lehavre.fr',3),
('LECLEACH','Louis','louis.le-cleach@etu.univ-lehavre.fr',3),
('LEMAGNEN','Bryan', 'bryan.lemagnen@gmail.com',3);









