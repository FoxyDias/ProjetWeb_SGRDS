/* Script creation-insertion-etudiants.sql */

-- creation de la table des etudiants

CREATE TABLE etudiants_sgrds (
    idEtu serial primary key,
    nomEtu varchar(50) NOT NULL,
    prenomEtu varchar(50) NOT NULL,
    adrEtu varchar(255) NOT NULL,
    absEtu text,
    promoEtu  integer NOT NULL

);

-- insertion des etudiants

INSERT INTO etudiants_sgrds (nomEtu, prenomEtu, adrEtu, absEtu, promoEtu) VALUES
-- etudiants BUT 1
('HERAMBERT', 'Ted','ted.herambert@etu.univ-lehavre.fr', 'justifie',1),
('NOTERIS', 'Arthur', 'arthur.noteris@etu.univ-lehavre.fr', 'justifie',1),
('RAVENEL','Martin','martin.ravenel@etu.univ-lehavre.fr','non-justifie',1),
('VIEZ','Remi', 'remi.viez@etu.univ-lehavre.fr','non-justifie',1),
-- etudiant BUT 2
('CHAMPVILLARD','Sebastien','sebastien.champvillard@etu.univ-lehavre.fr','justifie',2),
('GALMANT','Maxime','maxime.galmant@etu.univ-lehavre.fr','justifie',2),
('DUNET','Tom','tom.dunet@etu.univ-lehavre.fr','non-justifie',2),
('LECOMTE','Arthur','arthur.lecompte@etu.univ-lehavre.fr','non-justifie',2),
-- etudiant BUT 3
('ROCHA','Anthony','anthony.rocha@etu.univ-lehavre.fr','justifie',3),
('CLACCIN','Noemie','noemie.claccin@etu.univ-lehavre.fr','justifie',3),
('LECLEACH','Louis','louis.le-cleach@etu.univ-lehavre.fr','non-justifie',3),
('LEMAGNEN','Bryan', 'bryan.lemagnen@etu.univ-lehavre.fr','non-justifie',3);









